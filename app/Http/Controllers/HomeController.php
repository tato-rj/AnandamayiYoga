<?php

namespace App\Http\Controllers;

use App\RoutineQuestionaire;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/user/dashboard/index', [
            'show' => ['routine', 'recommended', 'favorites', 'progress'],
            'limit' => 6
        ]);
    }
}
