<?php

namespace App\Http\Controllers;

use App\{Course, Teacher};
use Illuminate\Http\Request;
use App\Http\Requests\CreateCourseForm;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();

        return view('pages/course/index', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateCourseForm $form)
    {
        $course = Course::create([
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'cost' => $request->cost,
            'headline' => $request->headline,
            'description' => $request->description,
            'image_path' => imageToS3($request, 'courses'),
            'video_path' => videoToS3($request, 'courses')
        ]);

        foreach ($request->teachers as $teacher) {
            $course->teachers()->attach($teacher);
        }

        return redirect()->route('admin.courses.chapters.manage', ['course' => $course->slug])
                         ->with(['status' => 'The course has been successfully created! Use this page to create the chapters.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {        
        if (! $course->published)
            return redirect(route('courses.index'));

        if (auth()->check() && auth()->user()->can('view', $course))
            return view('pages/course/show/index', compact(['course']));
        
        return view('pages/course/description/index', compact(['course']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function purchase(Course $course)
    {
        if (auth()->check() && auth()->user()->can('view', $course))
            return view('pages/course/show/index', compact(['course']));

        if (! $course->published)
            return redirect(route('courses.index'));

        return view('pages/course/purchase/index', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $teachers = Teacher::orderBy('name')->get();

        return view('admin/pages/courses/edit/index', compact(['course', 'teachers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $courseId)
    {
        $course = Course::find($courseId);

        $course->update([
            $request->key => $request->value
        ]);

        $course->slug = str_slug($course->name);
        $course->save();

        if ($request->ajax())
            return 'The course has been successfully edited.';

        return redirect()->back()->with('status', 'The course has been successfully edited.');
    }

    public function status(Request $request, $courseId)
    {
        $course = Course::find($courseId);

        if ($request->is_published) {
            $course->unpublish();
        } else {
            $course->publish();
        }

        return redirect()->back()->with('status', 'The course status has been successfully updated.');
    }

    public function updateTeachers(Request $request, $courseId)
    {
        $course = Course::find($courseId);
        
        $course->teachers()->sync($request->value);

        if ($request->ajax())
            return 'The teachers have been successfully edited.';
    }

    public function updateImage(Request $request, Course $course)
    {
        $newImage = imageToS3($request, 'courses');

        if ($newImage) {
            $course->deleteImage();
            
            $course->update([
                'image_path' => $newImage
            ]);

            return back()->with('status', 'The image image has been successfully updated.');
        }
    }

    public function updateVideo(Request $request, Course $course)
    {
        $newVideo = videoToS3($request, 'courses');

        if ($newVideo) {
            $course->deleteVideo();
            
            $course->update([
                'video_path' => $newVideo
            ]);

            return back()->with('status', 'The video has been successfully updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect('office/courses')->with('status', 'The course has been deleted.');
    }
}
