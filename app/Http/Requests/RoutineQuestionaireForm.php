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
            'duration' => 'required',
            'age' => 'required',
            'lifestyle' => 'required',
            'level' => 'required',
            'categories' => 'required',
            'practice' => 'required'
        ];
    }
}
