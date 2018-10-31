<?php

namespace App\Http\Controllers\Courses;

use App\{Reply, Course, Discussion};
use App\Http\Requests\StoreReply;
use App\Events\ReplyCreated;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RepliesController extends Controller
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
    public function store(Request $request, Course $course, Discussion $discussion, StoreReply $form)
    {
        $reply = $discussion->replies()->create([
            'body' => $request->body,
            'user_id' => auth()->user()->id]);
        
        event(new ReplyCreated($reply));

        return redirect()->back()->with('status', 'Your reply has been saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Discussion $discussion, Reply $reply)
    {
        $this->authorize('update', $reply);

        $reply->delete();

        return redirect()->back()->with('status', 'Your reply has been deleted.');
    }
}
