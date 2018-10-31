<?php

namespace App\Http\Controllers\Users;

use App\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbacksController extends Controller
{
    public function index()
    {
        $types = Feedback::types();
        $currentType = ! request('type') || ! in_array(request('type'), $types) ? 'experience' : request('type');
        
        return view('admin/pages/feedbacks/index', compact(['types', 'currentType']));    
    }

    public function show(Feedback $feedback)
    {        
        return view('admin/pages/feedbacks/show', compact('feedback'));    
    }

    public function store(Request $request)
    {
        Feedback::create([
            'about' => $request->feedback_about,
            'target_type' => $request->feedback_target_type,
            'target_id' => $request->feedback_target_id,
            'email' => auth()->check() ? auth()->user()->email : $request->feedback_email,
            'score' => $request->feedback_score,
            'comment' => $request->feedback_comment,
            'page' => $request->feedback_page
        ]);

        if ($request->ajax())
            return response()->json(['passes' => true]);

        return redirect()->back()->with('status', 'Thank you for your feedback.');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('admin.feedbacks.index')->with('status', 'The feedback has been successfully removed.');
    }
}
