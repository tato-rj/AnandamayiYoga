<?php

namespace App\Http\Controllers\Reads;

use App\ArticleTopic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleTopicsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:article_topics'
        ]);

    	ArticleTopic::create([
    		'slug' => str_slug($request->name),
    		'name' => $request->name,
            'name_pt' => $request->name_pt
    	]);

        return redirect()->back()->with('status', 'The topic has been successfully created.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArticleTopic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $topic)
    {
        $topic = ArticleTopic::find($topic);

        $topic->update([
            $request->key => $request->value
        ]);

        $topic->slug = str_slug($topic->name);
        $topic->save();

        if ($request->ajax())
            return 'The topic has been successfully edited.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleTopic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($topicId)
    {
        $topic = ArticleTopic::find($topicId);

        if ($topic)
            $topic->delete();

        return redirect()->back()->with('status', 'The topic has been deleted.');
    }
}
