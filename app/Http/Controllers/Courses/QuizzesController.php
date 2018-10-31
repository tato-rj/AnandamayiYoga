<?php

namespace App\Http\Controllers\Courses;

use App\{Quiz, Course, Chapter, Completable};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizzesController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    public function submit(Request $request, Course $course, Chapter $chapter, Quiz $quiz)
    {
        $record = Completable::create([
            'completable_id' => $quiz->id,
            'completable_type' => get_class($quiz),
            'user_id' => auth()->user()->id,
            'answer' => serialize($request->answer)
        ]);

        return redirect()->back()->with(compact('record'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course, Chapter $chapter, Quiz $quiz)
    {
        $validation = $chapter->validateQuiz($request->content);

        if ($validation)
            return redirect()->back()->with('error', $validation);

        $quiz->update(['content' => serialize($request->content)]);

        return redirect()->back()->with('status', 'The chapter has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
