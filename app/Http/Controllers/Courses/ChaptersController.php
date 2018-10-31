<?php

namespace App\Http\Controllers\Courses;

use App\{Chapter, Course, Completable};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChaptersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage(Course $course)
    {
        return view('admin/pages/courses/chapters/index', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $chapter = Chapter::create([
            'course_id' => $course->id,
            'order' => $course->chapters->count(),
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('status', 'The chapter has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Chapter $chapter, $relationship, $relationshipId)
    {
        if (! auth()->user()->can('view', $course))
            return redirect(route('courses.show', $course->slug));

        $relationship = str_plural($relationship);

        if (! method_exists($chapter, $relationship))
            return abort(404);

        $content = $chapter->$relationship()->find($relationshipId);

        if (! $content)
            return abort(404);

        return view('pages/course/show/chapter/index', compact(['chapter', 'content']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Chapter $chapter)
    {
        $chapter->update([
            $request->key => $request->value
        ]);

        if ($request->ajax())
            return 'The chapter has been successfully edited.';
    }

    public function submitAnswer(Request $request, Course $course, Chapter $chapter, $relationship, $relationshipId)
    {
        $relationship = str_plural($relationship);

        if (! method_exists($chapter, $relationship))
            return abort(404);

        $record = Completable::create([
            'completable_id' => $relationshipId,
            'completable_type' => get_class($chapter->$relationship()->getRelated()),
            'user_id' => auth()->user()->id,
            'answer' => $request->answer ? serialize($request->answer) : null
        ]);
        
        return redirect()->back()->with(compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $chapter
     * @return \Illuminate\Http\Response
     */
    public function createContent(Request $request, Course $course, Chapter $chapter)
    {
        $model = $request->content_type;

        $method = $chapter->stringToMethodName($model);

        if (! class_exists($model) || ! method_exists($chapter, $method))
            return redirect()->back()->with('error', 'This content doesn\'t exist.');

        $content = $chapter->$method($request);

        if (is_object($content))
            return redirect()->back()->with('status', 'The content has been successfully created!');

        if ($content)
            return redirect()->back()->with('error', $content);

        return redirect()->back()->with('error', 'Something went wrong.');
    }

    public function updateContent(Request $request, Course $course, Chapter $chapter, $relationship, $id)
    {
        if (! method_exists($chapter, $relationship))
            return redirect()->back()->with('error', 'This model doesn\'t exist.');

        $chapter->$relationship()->find($id)->update([
            $request->key => $request->value
        ]);

        if ($request->ajax())
            return 'The chapter has been successfully edited.';
    }

    public function updateVideo(Request $request, Course $course, Chapter $chapter, $relationship, $id)
    {
        if (! method_exists($chapter, $relationship))
            return redirect()->back()->with('error', 'This model doesn\'t exist.');

        $newVideo = videoToS3($request, "courses/$relationship");

        if ($newVideo) {
            $model = $chapter->$relationship()->find($id);

            $model->deleteVideo();
            
            $model->update([
                'video_path' => $newVideo,
                'duration' => $request->duration
            ]);

            return redirect()->back()->with('status', 'The video has been successfully updated.');
        }

        return redirect()->back()->with('error', 'The video was not found.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $chapter
     * @return \Illuminate\Http\Response
     */
    public function deleteContent(Request $request, Course $course, Chapter $chapter)
    {
        $model = $request->content_type;

        $relationship = $request->relationship;

        if (! method_exists($chapter, $relationship))
            return redirect()->back()->with('error', 'This content doesn\'t exist.');
        
        $chapter->$relationship->find($request->id)->delete();

        return back()->with('status', 'The content has been deleted.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Chapter $chapter)
    {
        $chapter->delete();

        $course->reorderChapters();

        return back()->with('status', 'The chapter has been deleted.');
    }
}
