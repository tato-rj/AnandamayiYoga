<?php

namespace App\Http\Controllers\Asanas;

use App\{Asana, AsanaType, AsanaSubType};
use App\Filters\AsanaFilters;
use App\Records\Visits;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAsanaForm;
use App\Http\Controllers\Controller;

class AsanasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, AsanaFilters $filters)
    {
        $asanas = Asana::filter($filters)->get();

        return view('pages/discover/asanas/index', compact('asanas'));
    }

    public function checkTitle(Request $request)
    {
        if (Asana::where('sanskrit', $request->name)->exists())
            return response()->json(['passes' => false]);

        return response()->json(['passes' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateAsanaForm $form)
    {
        $asana = Asana::create([
            'sanskrit' => $request->sanskrit,
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'name_pt' => $request->name_pt,
            'etymology' => $request->etymology,
            'etymology_pt' => $request->etymology_pt,
            'also_known_as' => $request->also_known_as,
            'also_known_as_pt' => $request->also_known_as_pt,
            'image_path' => imageToS3($request, 'asanas'),
            'video_path' => videoToS3($request, 'asanas'),
        ]);

        if ($request->benefits)
            $asana->createMany($request->benefits, 'benefits');
    
        if ($request->steps)
            $asana->createMany($request->steps, 'steps');

        $asana->types()->attach($request->types);
        $asana->subtypes()->attach($request->subtypes);
        $asana->levels()->attach($request->levels);

        // event(new LessonCreated($asana));

        return back()->with('status', "The asana {$asana->name} has been successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asana  $asana
     * @return \Illuminate\Http\Response
     */
    public function show(Asana $asana)
    {
        $asana->increment('views');

        return view('pages/discover/asanas/asana/index', compact('asana'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asana  $asana
     * @return \Illuminate\Http\Response
     */
    public function edit(Asana $asana)
    {
        return view('admin/pages/asanas/edit/layout', compact('asana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asana  $asana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asanaId)
    {
        $asana = Asana::find($asanaId);

        $this->authorize('update', $asana);

        $asana->update([
            $request->key => $request->value
        ]);

        $asana->slug = str_slug($asana->name);
        $asana->save();

        if ($request->ajax())
            return 'The asana has been successfully edited';
    }

    public function updateTypes(Request $request, $asanaId)
    {
        Asana::find($asanaId)
            ->types()
            ->sync($request->value);

        if ($request->ajax())
            return 'The types have been successfully edited';
    }

    public function updateSubTypes(Request $request, $asanaId)
    {
        Asana::find($asanaId)
            ->subtypes()
            ->sync($request->value);

        if ($request->ajax())
            return 'The subtypes have been successfully edited';
    }

    public function updateBenefits(Request $request, $asanaId)
    {
        $asana = Asana::find($asanaId);

        $asana->benefits()->delete();

        if ($request->value)
            $asana->createMany($request->value, 'benefits');

        if ($request->ajax())
            return 'The benefits have been successfully edited';
    }

    public function updateSteps(Request $request, $asanaId)
    {
        $asana = Asana::find($asanaId);
        
        $asana->steps()->delete();

        if ($request->value)
            $asana->createMany($request->value, 'steps');

        if ($request->ajax())
            return 'The steps have been successfully edited';
    }

    public function updateLevels(Request $request, $asanaId)
    {
        Asana::find($asanaId)
            ->levels()
            ->sync($request->value);

        if ($request->ajax())
            return 'The levels have been successfully edited';
    }

    public function updateImage(Request $request, Asana $asana)
    {
        $newImage = imageToS3($request, 'asanas');

        if ($newImage) {
            $asana->deleteImage();

            $asana->update([
                'image_path' => $newImage
            ]);

            return back()->with('status', 'The image has been successfully updated');
        }
    }

    public function updateVideo(Request $request, Asana $asana)
    {
        $newVideo = videoToS3($request, 'asanas');

        if ($newVideo) {
            $asana->deleteVideo();
            
            $asana->update([
                'video_path' => $newVideo
            ]);

            return back()->with('status', 'The video has been successfully updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asana  $asana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asana $asana)
    {
        $this->authorize('delete', $asana);

        $asana->delete();

        return back()->with('status', 'The asana has been deleted.');
    }
}
