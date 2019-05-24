<?php

namespace App\Http\Controllers\Downloads;

use App\{Wallpaper, WallpaperCategory};
use Illuminate\Http\Request;
use App\Filters\WallpaperFilters;
use App\Http\Controllers\Controller;

class WallpapersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WallpaperFilters $filters)
    {
        $wallpaperCategories = WallpaperCategory::orderBy('order')->get();
        $request = Wallpaper::filter($filters);
        
        if (! auth()->check())
            $request->take(12);

        $wallpapers = $request->get();

        return view('pages/discover/wallpapers/index', compact('wallpapers', 'wallpaperCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wp_categories = WallpaperCategory::orderBy('order')->get();

        return view('admin/pages/wallpapers/index', compact(['wp_categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wallpaper = Wallpaper::create([
            'category_id' => $request->category_id,
            'image_path' => imageToS3($request, 'wallpapers'),
        ]);

        $wallpaper->createThumbnail($request->file('image'));

        if (!$wallpaper)
            return response()->json('Something went wrong...', 404);

        return response()->json(200);
    }

    public function categoryStore(Request $request)
    {
        $request->validate(['name' => 'required', 'name_pt' => 'required']);

        WallpaperCategory::create(['name' => $request->name, 'name_pt' => $request->name_pt]);

        return redirect()->back()->with('status', 'The category has been created!');        
    }

    public function categoryEdit(Request $request, WallpaperCategory $category)
    {
        return view('admin/pages/wallpapers/edit', compact(['category']));      
    }

    public function categoryUpdate(Request $request, WallpaperCategory $category)
    {
        $request->validate(['name' => 'required', 'name_pt' => 'required']);

        $category->update(['name' => $request->name, 'name_pt' => $request->name_pt]);

        return redirect()->back()->with('status', 'The category has been updated!');        
    }

    public function categorySort(Request $request, $categoryId)
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

    public function categoryDestroy(Request $request, WallpaperCategory $category)
    {
        $category->delete();

        return redirect()->back()->with('status', 'The category has been removed!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function show(WallpaperCategory $category)
    {
        return view('admin/pages/wallpapers/show', compact(['category']));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallpaper $wallpaper)
    {
        $wallpaper->deleteImage();
        $wallpaper->deleteThumbnail();
        $wallpaper->delete();

        return redirect()->back()->with('status', 'The wallpaper has been removed.');
    }
}
