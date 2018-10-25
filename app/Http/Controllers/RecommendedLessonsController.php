<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendedLessonsController extends Controller
{
    public function index()
    {    
    	return view('pages/user/dashboard/index', [
    		'show' => ['recommended'],
    		'limit' => null
    	]);
    }
}
