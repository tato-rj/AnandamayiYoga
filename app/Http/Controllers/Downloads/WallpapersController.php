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
        $wallpaperCategories = WallpaperCategory::orderBy('name')->get();
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
    public function create(WallpaperCategory $category)
    {
        $wallpapers = $category->wallpapers;

        return view('admin/pages/wallpapers/index', compact(['category', 'wallpapers']));
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Wallpaper  $wallpaper
     * @return \Illuminate\Http\Response
     */
    public function show(Wallpaper $wallpaper)
    {
        //
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
