<?php

namespace App\Http\Controllers\Reads;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    public function index()
    {
    	return view('pages/reads/books/index');
    }
}
