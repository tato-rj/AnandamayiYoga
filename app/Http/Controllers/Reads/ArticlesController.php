<?php

namespace App\Http\Controllers\Reads;

use App\{Article, ArticleTopic, Teacher};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $topics = ArticleTopic::orderBy('name')->get();
        $teachers = Teacher::orderBy('name')->get();

        return view('admin/pages/articles/create/index', compact(['topics', 'teachers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'unique:articles|required',
            'content' => 'required',
            'author_id' => 'required',
            'subject' => 'sometimes|required|string'
        ]);

        $article = Article::create([
            'slug' => str_slug($request->title),
            'title' => $request->title,
            'summary' => $request->summary,
            'content' => $request->content,
            'image_path' => $request->has('image') ? imageToS3($request, 'articles') : null,
            'subject' => $request->subject ?? null,
            'author_id' => $request->author_id
        ]);

        $article->topics()->attach($request->topic);
        
        $route = $request->has('subject') ? route('admin.articles.index') : route('admin.articles.blog');

        return redirect($route)->with('status', "The article {$article->title} has been successfully created.");
    }

    public function checkTitle(Request $request)
    {
        if (Article::where('title', $request->title)->exists())
            return response()->json(['passes' => false]);

        return response()->json(['passes' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('pages/reads/articles/show/layout', compact('article'));
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

        return view('admin/pages/articles/edit/index', compact(['article', 'topics', 'teachers']));
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

    public function uploadImage(Request $request)
    {
        $image = imageToS3($request, "articles/{$request->article_id}");
     
        return cloud($image);
    }

    public function removeImage(Request $request)
    {
        $path = str_replace('https://anandamayiyoga.s3.amazonaws.com/', '', $request->image_path);

        Storage::disk('s3')->delete($path);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return back()->with('status', 'The article has been deleted.');
    }
}
