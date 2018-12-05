<?php

namespace App\Http\Requests;

use App\Asana;
use Illuminate\Foundation\Http\FormRequest;

class CreateAsanaForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create', new Asana);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sanskrit' => 'required',
            'name' => 'required|unique:asanas',
            'image' => 'required|image|max:800',
            'types' => 'required',
            'levels' => 'required'
        ];
    }
}
