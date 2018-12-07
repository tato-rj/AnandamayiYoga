<?php

namespace App\Http\Controllers\Admin;

use App\{TeacherQuestionaire, Teacher};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherQuestionairesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherQuestionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function index(Teacher $teacher)
    {
        return view('admin/pages/teachers/questionaire/index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/teachers/questionaire/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Teacher $teacher)
    {
        $request->validate([
            'questions' => 'required'
        ]);
        
        TeacherQuestionaire::create([
            'teacher_id' => $teacher->id,
            'questions' => serialize($request->questions),
            'questions_pt' => serialize($request->questions_pt)
        ]);

        return redirect(route('admin.teachers.questionaire.index', $teacher->slug))->with('status', "The questionarie has been successfully created.");
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
    public function edit(Teacher $teacher)
    {
        return view('admin/pages/teachers/questionaire/edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherQuestionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher, TeacherQuestionaire $questionaire)
    {
        $questionaire->update([
            'questions' => serialize($request->questions),
            'questions_pt' => serialize($request->questions_pt)
        ]);

        return back()->with('status', "The questionarie has been successfully updated.");
    }

    public function status(Request $request, Teacher $teacher, TeacherQuestionaire $questionaire)
    {
        $questionaire->updateStatus();
        
        return back()->with('status', "Status updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherQuestionaire  $questionaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher, TeacherQuestionaire $questionaire)
    {
        $questionaire->delete();

        return redirect(route('admin.teachers.questionaire.index', $teacher->slug))->with('status', "The questionarie has been successfully deleted.");
    }
}
