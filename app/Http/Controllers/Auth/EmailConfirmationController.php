<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\EmailConfirmation;
use App\Events\UserConfirmedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailConfirmationController extends Controller
{
    public function confirm(Request $request)
    {
    	$user = User::where('confirmation_token', $request->token)->firstOrFail()->confirm();

        \Auth::login($user, true);
        
        event(new UserConfirmedEmail($user));

    	return redirect('/me')->with('status', 'Your email has been successfully confirmed, thank you :)');
    }

    public function request(Request $request)
    {
        $user = User::where('email', $request->email)->first();

    	Mail::to($user)->send(new EmailConfirmation($user));

    	return redirect()->back()->with('status', 'We just sent you another email.');
    }
}
