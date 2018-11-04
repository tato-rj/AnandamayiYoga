<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:courses',
            'cost' => 'required',
            'headline' => 'required',
            'description' => 'required',
            'language' => 'required',
            'image' => 'required|image|max:800',
            'video' => 'required',
            'teachers' => 'required'
        ];
    }
}
