<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
	public function profile()
	{
		$timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
		
		$currencies = ['brl' => 'Brazilian Real (R$)', 'eur' => 'European Euro (€)', 'usd' => 'United States Dollar ($)'];

		return view('pages/user/settings/profile/index', compact('timezones', 'currencies'));
	}

	public function preferences()
	{
		return view('pages/user/settings/preferences/index');
	}

	public function membership()
	{
		return view('pages/user/settings/membership/index');
	}

	public function payment()
	{
		return view('pages/user/settings/payment/index');
	}

	public function notifications()
	{
		return view('pages/user/settings/notifications/index');
	}

	public function invoices()
	{
        $upcomingPayment;

        if (auth()->user()->hasMembership()) {
            $invoice = auth()->user()->membership->upcomingInvoice();
            $upcomingPayment = priceToCurrency($invoice->currency, $invoice->amount_due);
        }
        
        return view('pages/user/settings/invoices/index', compact('upcomingPayment'));
	}

	public function remove()
	{
		return view('pages/user/settings/remove/index');
	}
}
