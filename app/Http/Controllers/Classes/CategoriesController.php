<?php

namespace App\Http\Controllers\Classes;

use App\Filters\LessonFilters;
use App\{Category, Lesson};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:categories'
        ]);
        
        $category = Category::firstOrCreate([
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'subtitle' => $request->subtitle,
            'description' => $request->description
        ]);

        return back()->with('status', "The category {$category->name} has been successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category, LessonFilters $filters)
    {
        $lessons = Lesson::byCategory($category)->filter($filters)->paginate(12);
        
        if ($request->ajax())
            return view('pages/discover/lessons/show', ['lessons' => $lessons])->render();

        return view('pages/discover/categories/index', compact(['category', 'lessons']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId)
    {
        $category = Category::find($categoryId);

        $category->update([
            $request->key => $request->value
        ]);

        $category->slug = str_slug($category->name);
        $category->save();

        if ($request->ajax())
            return 'The category has been successfully edited';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId)
    {
        Category::find($categoryId)->delete();

        return back()->with('status', 'The category has been deleted.');
    }
}
