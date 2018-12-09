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

    public function instructions()
    {
        $teachers = Teacher::hasPublishedQuestionaires()->get();
        
        return view('pages/user/routine/instructions/index', compact('teachers'));
    }

    public function form(Teacher $teacher)
    {
        if (! $teacher->questionaire->published)
            return redirect(route('user.routine.instructions'));

        return view('pages/user/routine/form/index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RoutineQuestionaire $request)
    {
        $lessons = Lesson::authorized()->published()->orderBy('name')->get();

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
        $questionaire =  RoutineQuestionaire::create([
            'user_id' => auth()->user()->id,
            'teacher_id' => $request->teacher_id,
            'schedule' => $request->schedule,
            'questions' => serialize($request->questions),
            'answers' => serialize($request->answers)
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
