<?php

namespace App\Http\Controllers\Routines;

use Carbon\Carbon;
use App\Events\Routines\StartRoutine;
use App\Events\RoutineCreated;
use App\{Routine, Schedule, RoutineQuestionaire, Lesson};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoutinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routines = Routine::latest()->paginate(8);

        return view('/admin/pages/routines/active', compact('routines'));
    }

    public function instructions()
    {
        return view('pages/user/routine/instructions/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $routine = Routine::create([
            'request_id' => $request->request_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
            'video_path' => videoToS3($request, 'routines'),
        ]);

        Schedule::createFrom($routine, $request->schedule);

        RoutineQuestionaire::find($request->request_id)->publish();

        event(new RoutineCreated($routine));

        return redirect('office/routines/active')->with('status', 'The Routine has been successfully created!');
    }

    public function complete(Routine $routine)
    {
        $routine->complete();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function show(Routine $routine, Lesson $lesson)
    {
        $routine->increment('views');

        if (is_null($routine->started_at)) {
            $routine->start();

            event(new StartRoutine(auth()->user()));

            return view('pages/user/routine/welcome', compact(['routine', 'lesson']));
        }

        return redirect(route('discover.classes.show', $lesson->slug));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function edit(Routine $routine)
    {
        $lessons = Lesson::orderBy('name')->get();
        
        $routine->questionaire->withSchedule();

        return view('admin/pages/routines/edit', compact(['routine', 'lessons']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routine $routine)
    {
        $routine->update([
            $request->key => $request->value
        ]);

        if ($request->ajax())
            return 'The routine has been successfully edited.';
    }

    public function updateSchedule(Request $request, Routine $routine)
    {
        $payload = $request->value;

        $date = Carbon::parse($payload[0]);
        array_shift($payload);

        $time = $payload[1];
        array_shift($payload);
        
        $schedules = Schedule::where([
            'routine_id' => $routine->id,
            'day' => $date
        ])->delete();

        foreach ($payload as $lesson) {
            $routine->schedules()->create([
                'lesson_id' => $lesson,
                'day' => $date,
                'time' => $time
            ]);
        }

        if ($request->ajax())
            return "The schedule for {$date->format('D d')} has been successfully edited.";
    }

    public function updateVideo(Request $request, Routine $routine)
    {
        $newVideo = $request->file('video')->store(cloudEnv()."/routines/videos", 's3');

        if ($newVideo) {
            $routine->deleteVideo();
            
            $routine->update([
                'video_path' => $newVideo
            ]);

            return back()->with('status', 'The video has been successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routine $routine)
    {
        $routine->delete();

        return back()->with('status', 'The routine schedule has been successfully deleted.');
    }
}
