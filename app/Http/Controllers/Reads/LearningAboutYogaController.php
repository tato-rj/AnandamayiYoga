<?php

namespace App\Http\Controllers\Reads;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearningAboutYogaController extends Controller
{
	public function index($subject)
	{
		$articles = Article::subject($subject)->paginate(12);

		return view("pages/reads/learning/index", compact(['articles', 'subject']));
	}

	public function show($subject, Article $article)
	{		
        return view("pages/reads/learning/show/index", compact(['subject', 'article']));
	}
}
