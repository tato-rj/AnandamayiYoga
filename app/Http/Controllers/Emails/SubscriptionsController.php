<?php

namespace App\Http\Controllers\Emails;

use App\Mail\SubscriptionGiftEmail;
use App\Subscription\Newsletter;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Events\Subscription;
use App\Subscription as EmailSubscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionsController extends Controller
{
    public function index()
    {
        $lists = EmailSubscription::lists();
        $currentList = request('list') ?? 'newsletter';
        $subscriptions = EmailSubscription::$currentList()->get();

        return view('admin/pages/subscriptions/index', compact(['lists', 'currentList', 'subscriptions']));
    }

    public function edit(EmailSubscription $subscription)
    {        
        $lists = EmailSubscription::lists($except = [$subscription->list]);

        return view('admin/pages/subscriptions/edit', compact(['subscription', 'lists']));
    }

    public function store(Request $request, $list)
    {
        $request->validate(['subscription_email' => 'email']);

        $subscription = EmailSubscription::createOrFail($request->subscription_email, $list);

        if (! $subscription)
            return redirect()->back()->with('error', 'This subscription already exists.');

    	if ($request->ajax())
    		return response('Your subscription has been updated.');

    	event(new Subscription($request->subscription_email));

    	return redirect()->back()->with('status', 'Thank you for subscribing, please check your email :)');
    }

    public function destroy(Request $request, $list)
    {
        User::where('email', $request->subscription_email)->first()->unsubscribeFrom($list);
        
        if (request()->ajax())
            return response('Your subscription has been updated.');

        return redirect()->route('admin.subscriptions.index')->with('status', "The email has been removed from the list.");
    }
}
