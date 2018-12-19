<?php

namespace App\Http\Controllers\Reads;

use App\{Article, ArticleTopic, Teacher};
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index(ArticleTopic $topic)
    {
        $articles = Article::byTopic($topic->slug)->paginate(12);
        $currentTopic = $topic;
        $topics = ArticleTopic::all();

        return view("pages/reads/articles/index", compact(['articles', 'topics', 'currentTopic']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $topics = ArticleTopic::orderBy('name')->get();
        $teachers = Teacher::orderBy('name')->get();

        return view('admin/pages/reads/articles/create/index', compact(['topics', 'teachers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateArticleForm $form)
    {
        $article = Article::create([
            'slug' => str_slug($request->title),
            'title' => $request->title,
            'title_pt' => $request->title_pt,
            'content' => $request->content,
            'content_pt' => $request->content_pt,
            'image_path' => imageToS3($request, 'articles'),
            'author_id' => $request->author_id,
            'is_pinned' => $request->is_pinned ?? false,
            'unique_token' => random_token()
        ]);

        $article->topics()->attach($request->topics);
    
        return redirect(route('admin.reads.articles.index'))->with('status', "The article {$article->title} has been successfully created.");
    }

    public function checkTitle(Request $request)
    {
        if (Article::where('title', $request->title)->exists())
            return response()->json(['passes' => false]);

        return response()->json(['passes' => true]);
    }

    public function show(Article $article)
    {
        return view("pages/reads/articles/show/index", compact('article'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $topics = ArticleTopic::orderBy('name')->get();
        $teachers = Teacher::orderBy('name')->get();

        return view('admin/pages/reads/articles/edit/index', compact(['article', 'topics', 'teachers']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $articleId)
    {
        $article = Article::find($articleId);

        $this->authorize('update', $article);

        $article->update([
            $request->key => $request->value
        ]);

        $article->slug = str_slug($article->title);
        $article->save();

        if ($request->ajax())
            return 'The article has been successfully edited.';
    }

    public function updateTopics(Request $request, $articleId)
    {
        Article::find($articleId)
            ->topics()
            ->sync($request->value);

        if ($request->ajax())
            return 'The topics have been successfully edited.';
    }

    public function updateImage(Request $request, Article $article)
    {
        $newImage = imageToS3($request, 'articles');

        if ($newImage) {
            $article->deleteImage();
            
            $article->update([
                'image_path' => $newImage
            ]);

            return back()->with('status', 'The image has been successfully updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return back()->with('status', 'The article has been deleted.');
    }
}
