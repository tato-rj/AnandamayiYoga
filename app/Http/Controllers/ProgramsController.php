<?php

namespace App\Http\Controllers;

use App\{Program, Lesson};
use App\Records\Visits;
use App\Http\Requests\AddProgramForm;
use Illuminate\Http\Request;
use App\Events\ProgramCreated;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::has('lessons')->paginate(12);
        return view('pages/discover/programs/index', compact('programs'));
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

    public function checkTitle(Request $request)
    {
        if (Program::where('name', $request->name)->exists())
            return response()->json(['passes' => false]);

        return response()->json(['passes' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AddProgramForm $form)
    {
        $program = Program::create([
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => imageToS3($request, 'programs'),
            'video_path' => videoToS3($request, 'programs'),
            'teacher_id' => $request->teacher_id,
        ]);

        $program->categories()->attach($request->category);

        if ($request->lessons) {
            $program->lessons()->saveMany(Lesson::findMany($request->lessons));
        }
        
        event(new ProgramCreated($program));

        return back()->with('status', "The program {$program->name} has been successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        $program->increment('views_count');

        $list = $program->lessons->pluck('slug')->toArray();

        return view('pages/program/index', compact('program', 'list'));
    }

    public function lesson(Program $program, Lesson $lesson)
    {
        $list = $program->lessons->pluck('slug')->toArray();
        $currentIndex = array_search($lesson->slug, $list);
        $previous = (isset($list[$currentIndex - 1])) ? $list[$currentIndex - 1] : null;
        $next = (isset($list[$currentIndex + 1])) ? $list[$currentIndex + 1] : null;

        return view('pages/program/lesson/index', [
            'program' => $program,
            'list' => $list,
            'currentIndex' => $currentIndex+=1,
            'next' => $next,
            'previous' => $previous,
            'mainLesson' => $lesson
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $lessons = Lesson::whereNull('program_id')->get();
        $teachers = \App\Teacher::orderBy('first_name')->get();

        return view('admin/pages/programs/edit/layout', compact(['program', 'lessons', 'teachers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $programId)
    {
        $program = Program::find($programId);

        $program->update([
            $request->key => $request->value
        ]);

        $program->slug = str_slug($program->name);
        $program->save();

        if ($request->ajax())
            return 'The program has been successfully edited.';
    }

    public function updateImage(Request $request, Program $program)
    {
        $newImage = imageToS3($request, 'programs');

        if ($newImage) {
            $program->deleteImage();
            
            $program->update([
                'image_path' => $newImage
            ]);

            return back()->with('status', 'The image image has been successfully updated.');
        }

        return back()->with('error', 'We couldn\'t upload the new image at this time.');
    }

    public function updateVideo(Request $request, Program $program)
    {
        $newVideo = videoToS3($request, 'programs');

        if ($newVideo) {
            $program->deleteVideo();
            
            $program->update([
                'video_path' => $newVideo
            ]);

            return back()->with('status', 'The video has been successfully updated.');
        }

        return back()->with('error', 'We couldn\'t upload the new video at this time.');
    }

    public function updateCategories(Request $request, $programId)
    {
        Program::find($programId)
            ->categories()
            ->sync($request->value);

        if ($request->ajax())
            return 'The categories have been successfully edited.';
    }

    public function updateLessons(Request $request, $programId)
    {
        Program::find($programId)->syncLessons($request->value);

        if ($request->ajax())
            return 'The lessons have been successfully edited.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return back()->with('status', 'The program has been deleted.');
    }
}
