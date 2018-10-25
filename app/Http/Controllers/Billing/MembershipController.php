<?php

namespace App\Http\Controllers\Billing;

use App\User;
use App\Events\UserCanceledMembership;
use App\Http\Requests\StripeSubscriptionForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
	use StripeWebhooks;

    public function store(StripeSubscriptionForm $stripe)
    {
        $message = $stripe->save();

        if (array_key_exists('error', $message))
            return back()->with($message);
    
        return redirect('/me')->with($message);
    }

    public function cancel(Request $request)
    {
        $user = User::find($request->user_id);

        $user->membership->cancel();

        event(new UserCanceledMembership($user));

        return back()->with('status', "You have successfully canceled your membership. 
            Your account will remain active until {$user->fresh()->membership->subscription_ends_at->toFormattedDateString()}");
    }

    public function resume(Request $request)
    {
        $user = User::find($request->user_id);

        $user->membership->resume();

        return back()->with('status', "Your membership is fully active again :)");
    }

    public function events()
    {
    	$payload = request()->all();

    	if (method_exists($this, $method = $this->eventToMethod($payload['type'])))
    		return $this->$method($payload);
    }
}
