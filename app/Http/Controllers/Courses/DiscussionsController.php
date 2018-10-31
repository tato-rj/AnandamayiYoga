<?php

namespace App\Http\Controllers\Courses;

use App\{Discussion, Course};
use App\Filters\DiscussionFilters;
use App\Http\Requests\StoreDiscussion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscussionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course, DiscussionFilters $filters)
    {
        $discussions = $course->discussions()->filter($filters)->paginate(6);

        return view('pages/course/discussion/index', compact(['course', 'discussions']));
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
    public function store(Request $request, Course $course, StoreDiscussion $form)
    {
        $course->discussions()->create([
            'user_id' => auth()->user()->id,
            'subject' => $request->subject,
            'body' => $request->body,
            'chapter_id' => $request->chapter_id ?? null
        ]);

        return redirect()->back()->with('status', 'You have started a new discussion.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Discussion $discussion)
    {
        return view('pages/course/discussion/show/index', compact(['course', 'discussion']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Discussion $discussion)
    {
        $this->authorize('update', $discussion);

        $discussion->delete();

        return redirect(route('courses.show', $course->slug))->with('status', 'Your discussion has been deleted.');
    }
}
