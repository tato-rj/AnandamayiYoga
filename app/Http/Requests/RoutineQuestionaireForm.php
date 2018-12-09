<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoutineQuestionaireForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->pendingRoutine() || auth()->user()->activeRoutine())
            return back()->with('error', 'We have to wait until your current proccess is done. Please try again at another time!');

        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'schedule' => 'required',
            'questions' => 'required',
            'answers' => 'required'
        ];
    }
}
