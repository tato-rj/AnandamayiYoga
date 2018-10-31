<?php

namespace App\Http\Controllers\Courses;

use App\{SupportingMaterial, Course, Chapter};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportingMaterialsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course, Chapter $chapter)
    {
        $name = ucfirst(cleanFileName($request->file('file')->getClientOriginalName()));

        $material = SupportingMaterial::create([
            'chapter_id' => $chapter->id,
            'file_path' => fileToS3($request, "courses/$course->slug/chapters/$chapter->id"),
            'name' => $name
        ]);

        if (!$material)
            return response()->json('Something went wrong...', 404);

        return response()->json(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupportingMaterial  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportingMaterial $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupportingMaterial  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Chapter $chapter, SupportingMaterial $material)
    {
        $material->delete();

        return redirect()->back()->with('status', 'The file has been removed.');
    }
}
