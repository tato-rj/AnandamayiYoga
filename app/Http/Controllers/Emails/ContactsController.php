<?php

namespace App\Http\Controllers\Emails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\{ContactEmail, FeedbackEmail};
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function send(Request $request)
    {
    	$request->validate([
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'email' => 'required|email',
    		'subject' => 'required',
    		'message' => 'required'
    	]);

    	Mail::to($request->email)->send(new FeedbackEmail($request->first_name));

    	Mail::to('contact@anandamayiyoga.com')->send(new ContactEmail($request));

    	return redirect()->back()->with('status', 'Thank you for your contact! We\'ll get back to you shortly.');
    }
}
