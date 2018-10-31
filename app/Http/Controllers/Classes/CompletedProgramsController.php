<?php

namespace App\Http\Controllers\Classes;

use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompletedProgramsController extends Controller
{
    public function store(Program $program)
    {
   		auth()->user()->completedPrograms()->save($program);
    }
}
