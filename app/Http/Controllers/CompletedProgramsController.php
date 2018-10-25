<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class CompletedProgramsController extends Controller
{
    public function store(Program $program)
    {
   		auth()->user()->completedPrograms()->save($program);
    }
}
