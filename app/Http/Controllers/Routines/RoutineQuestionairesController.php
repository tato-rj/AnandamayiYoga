<?php

namespace App\Http\Controllers\Routines;

use App\{RoutineQuestionaire, Lesson, Teacher};
use App\Http\Requests\RoutineQuestionaireForm;
use Illuminate\Http\Request;
use App\Events\Routines\RoutineRequested;
use App\Http\Controllers\Controller;

class RoutineQuestionairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingRequests = RoutineQuestionaire::authorized()->pending()->paginate(8);
        
        return view('/admin/pages/routines/pending', compact('pendingRequests'));
    }

    public function form()
    {
        $teachers = Teacher::all();
        $activities = ['Yoga', 'Gym', 'Cycling', 'Pilates', 'Walk', 'Run', 'Hike', 'Swim', 'Surf', 'Dance', 'Team sport', 'I don\'t exercise', 'Other'];

        return view('pages/user/routine/form/index', compact(['activities', 'teachers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RoutineQuestionaire $request)
    {
        $lessons = Lesson::orderBy('name')->get();

        $request->withSchedule();

        return view('admin/pages/routines/create', compact(['request', 'lessons']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RoutineQuestionaireForm $form)
    {
        if (auth()->user()->pendingRoutine() || auth()->user()->activeRoutine())
            return back()->with('error', 'We have to wait until your current proccess is done. Please try again at another time!');

        $questionaire =  RoutineQuestionaire::create([
            'user_id' => auth()->user()->id,
            'teacher_id' => $request->teacher_id,
            'schedule' => $request->schedule,
            'duration' => $request->duration,
            'age' => $request->age,
            'lifestyle' => $request->lifestyle,
            'reason' => $request->reason,
            'level' => $request->level,
            'categories' => json_encode($request->categories),
            'practice' => json_encode($request->practice),
            'physical' => json_encode($request->physical),
            'mental' => json_encode($request->mental),
            'spiritual' => json_encode($request->spiritual)
        ]);

        event(new RoutineRequested(auth()->user()));

        return redirect('/me')->with('status', 'Your routine has been successfully submited.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return \Illuminate\Http\Response
     */
    public function show(RoutineQuestionaire $routineQuestionaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return \Illuminate\Http\Response
     */
    public function edit(RoutineQuestionaire $routineQuestionaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoutineQuestionaire $routineQuestionaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoutineQuestionaire $routineQuestionaire)
    {
        //
    }
}
