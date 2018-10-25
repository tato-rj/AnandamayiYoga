<?php

namespace App\Http\Controllers\Reads;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearningAboutYogaController extends Controller
{
	public function index()
	{
		$topics = Article::learningAboutYoga();

		return view('pages/reads/learning/index', compact('topics'));
	}

	public function show($section, $article)
	{
        return view("pages/reads/learning/articles/{$section}/{$article}", compact(['section', 'article']));
	}
}
