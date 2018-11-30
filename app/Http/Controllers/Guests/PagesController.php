<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;

class PagesController extends Controller
{
	public function home()
	{
		return view('pages/welcome/index');
	}

    public function platform()
    {
    	return view('pages/about/platform/index');
    }

    public function anandamayi()
    {
        $teacher = anandamayi();

    	return view('pages/about/anandamayi/index', compact('teacher'));
    }

    public function eranthus()
    {
    	return view('pages/about/eranthus/index');
    }

    public function goodbye()
    {
        if (session()->get('user-deleted'))
            return view('pages/user/settings/remove/feedback');

        return view('pages/welcome/index');
    }

    public function support()
    {
    	return view('pages/support/index');
    }

    public function getting_started()
    {
    	return view('pages/support/resources/getting_started/index');
    }

    public function membership()
    {
    	return view('pages/support/resources/membership/index');
    }

    public function profile()
    {
    	return view('pages/support/resources/profile/index');
    }

    public function privacy()
    {
    	return view('pages/support/resources/policy/index');
    }

    public function terms()
    {
    	return view('pages/support/resources/terms/index');
    }

    public function courses()
    {
    	return view('pages/support/resources/courses/index');
    }

    public function partnership()
    {
    	return view('pages/support/resources/partnership/index');
    }

    public function account()
    {
    	return view('pages/support/resources/account/index');
    }

    public function faq()
    {
    	return view('pages/support/resources/faq/index');
    }

    public function contact()
    {
    	return view('pages/support/contact/index');
    }
}
