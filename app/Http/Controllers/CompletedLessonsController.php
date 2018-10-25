<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class CompletedLessonsController extends Controller
{
    public function store(Lesson $lesson)
    {
   		auth()->user()->completedLessons()->save($lesson);
    }
}
