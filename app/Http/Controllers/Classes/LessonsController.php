<?php

namespace App\Http\Controllers\Classes;

use App\Filters\LessonFilters;
use App\{Lesson, Program, Teacher};
use Illuminate\Http\Request;
use App\Http\Requests\CreateSingleLessonForm;
use App\Events\LessonCreated;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, LessonFilters $filters)
    {
        $lessons = Lesson::valid()->published()->filter($filters)->paginate(12);
        
        // if ($request->ajax()){
        //     return view('pages/discover/lessons/show', ['lessons' => $lessons])->render();
        // }

        return view('pages/discover/lessons/index', compact('lessons'));
    }

    public function admin()
    {
        $lessons = Lesson::authorized()->paginate(11);
        $programs = Program::authorized()->orderBy('name')->get();
        $teachers = Teacher::orderBy('name')->get();

        return view('admin/pages/lessons/index', compact(['lessons', 'programs', 'teachers']));   
    }

    public function browse()
    {
        return view('pages/discover/browse/index');
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
        if (Lesson::where('name', $request->name)->exists())
            return response()->json(['passes' => false]);

        return response()->json(['passes' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateSingleLessonForm $form)
    {
        $lesson = Lesson::create([
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'name_pt' => $request->name_pt,
            'description' => $request->description,
            'description_pt' => $request->description_pt,
            'image_path' => imageToS3($request, 'lessons'),
            'video_path' => videoToS3($request, 'lessons'),
            'duration' => $request->duration,
            'program_id' => $request->program_id,
            'is_free' => $request->is_free,
            'teacher_id' => $request->teacher_id,
            'published' => now()
        ]);

        $lesson->categories()->attach($request->category);
        $lesson->levels()->attach($request->levels);

        event(new LessonCreated($lesson));

        return redirect()->back()->with('status', "The lesson {$lesson->name} has been successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $lesson->increment('views');

        return view('pages/lesson/index', ['mainLesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $programs = Program::authorized()->get();
        $teachers = \App\Teacher::orderBy('name')->get();

        return view('admin/pages/lessons/edit/layout', compact(['lesson', 'programs', 'teachers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lessonId)
    {
        $lesson = Lesson::find($lessonId);

        $this->authorize('update', $lesson);

        $lesson->update([$request->key => $request->value]);

        $lesson->slug = str_slug($lesson->name);
        $lesson->save();

        if ($request->ajax())
            return 'The lesson has been successfully edited.';
    }

    public function status(Request $request, Lesson $lesson)
    {
        $lesson->updateStatus();

        return back()->with('status', "Status updated.");
    }

    public function updateImage(Request $request, Lesson $lesson)
    {
        $newImage = imageToS3($request, 'lessons');

        if ($newImage) {
            $lesson->deleteImage();
            
            $lesson->update([
                'image_path' => $newImage
            ]);

            return back()->with('status', 'The image has been successfully updated.');
        }
    }

    public function updateVideo(Request $request, Lesson $lesson)
    {
        $newVideo = videoToS3($request, 'lessons');

        if ($newVideo) {
            $lesson->deleteVideo();
            
            $lesson->update([
                'video_path' => $newVideo,
                'duration' => $request->duration
            ]);

            return back()->with('status', 'The video has been successfully updated.');
        }
    }

    public function updateCategories(Request $request, $lessonId)
    {
        Lesson::find($lessonId)
            ->categories()
            ->sync($request->value);

        if ($request->ajax())
            return 'The categories have been successfully edited.';
    }

    public function updateLevels(Request $request, $lessonId)
    {
        Lesson::find($lessonId)
            ->levels()
            ->sync($request->value);

        if ($request->ajax())
            return 'The levels have been successfully edited.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $this->authorize('delete', $lesson);

        $lesson->delete();

        return back()->with('status', 'The lesson has been deleted.');
    }
}
