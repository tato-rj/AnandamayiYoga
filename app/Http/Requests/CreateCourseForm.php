<?php

namespace App\Http\Requests;

use App\Course;
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
        return auth()->user()->can('create', new Course);
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
            'teachers' => 'required'
        ];
    }
}
