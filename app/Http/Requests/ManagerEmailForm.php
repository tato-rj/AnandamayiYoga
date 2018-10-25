<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\ManagerEmail;

class ManagerEmailForm extends FormRequest
{
    protected $redirectRoute = 'office@createMail';
    
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
            'recipients' => 'required',
            'from' => 'required',
            'subject' => 'required|min:4',
            'message' => 'required|min:4',
            'attachment' => 'max:5000'
        ];
    }

    public function send($request)
    {
        $recipients = explode(', ', $request->recipients);

        foreach ($recipients as $recipient) {
            Mail::to($recipient)->send(new ManagerEmail($request));
        }
    }
}
