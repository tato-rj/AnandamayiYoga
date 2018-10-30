<?php

namespace App\Http\Controllers\Reads;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::blog()->paginate(6);

        return view('pages/reads/blog/index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('pages/reads/blog/show/index', compact('article'));
    }
}
