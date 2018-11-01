<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    public function set(Request $request)
    {
        \Session::put('lang', $request->language);

        return redirect()->back();
    }
}
