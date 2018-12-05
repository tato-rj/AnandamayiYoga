<?php

namespace App\Http\Requests;

use App\Program;
use Illuminate\Foundation\Http\FormRequest;

class AddProgramForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create', new Program);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:programs',
            'description' => 'required',
            'image' => 'required|image|max:800',
            'video' => 'required',
            'category' => 'required'
        ];
    }
}
