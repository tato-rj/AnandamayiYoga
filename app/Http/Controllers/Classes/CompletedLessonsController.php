<?php

namespace App\Http\Controllers\Classes;

use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompletedLessonsController extends Controller
{
    public function store(Lesson $lesson)
    {
   		auth()->user()->completedLessons()->save($lesson);
    }
}
