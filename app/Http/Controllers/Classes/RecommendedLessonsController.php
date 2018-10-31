<?php

namespace App\Http\Controllers\Classes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
