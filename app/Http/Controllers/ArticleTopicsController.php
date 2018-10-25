<?php

namespace App\Http\Controllers;

use App\ArticleTopic;
use Illuminate\Http\Request;

class ArticleTopicsController extends Controller
{
    public function store(Request $request)
    {
    	ArticleTopic::create([
    		'slug' => str_slug($request->name),
    		'name' => $request->name
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
    public function destroy(ArticleTopic $topic)
    {
        $topic->delete();

        return redirect()->back()->with('status', 'The topic has been deleted.');
    }
}
