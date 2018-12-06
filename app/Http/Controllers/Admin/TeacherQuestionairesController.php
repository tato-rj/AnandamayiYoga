<?php

namespace App\Http\Controllers\Admin;

use App\{TeacherQuestionaire, Teacher};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherQuestionairesController extends Controller
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
        $request->validate([
            'teacher_id' => 'required|unique:teacher_questionaires',
            'questions' => 'required'
        ]);

        TeacherQuestionaire::create([
            'teacher_id' => $request->teacher_id,
            'questions' => serialize($request->questions)
        ]);

        return back()->with('status', "The questionarie has been successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherQuestionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherQuestionaire $questionaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherQuestionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherQuestionaire $questionaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherQuestionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherQuestionaire $questionaire)
    {
        $questionaire->update(['questions' => serialize($request->questions)]);

        return back()->with('status', "The questionarie has been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherQuestionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherQuestionaire $questionaire)
    {
        $questionaire->delete();

        return back()->with('status', "The questionarie has been successfully deleted.");
    }
}
