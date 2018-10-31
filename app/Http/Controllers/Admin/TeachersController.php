<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTeacherForm;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
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
    public function store(Request $request, CreateTeacherForm $form)
    {
        $teacher = Teacher::create([
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'image_path' => imageToS3($request, 'teachers'),
            'cover_path' => coverToS3($request, 'teachers'),
            'biography' => $request->biography,
            'email' => $request->email,
            'website' => $request->website
        ]);

        $teacher->categories()->attach($request->category);

        return back()->with('status', "{$teacher->fullName} has been successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        if ($teacher->name == 'Anandamayi')
            return redirect()->route('about.ali-anandamayi');

        return view('pages/about/teachers/show/index', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admin/pages/teachers/edit/layout', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teacherId)
    {
        $teacher = Teacher::find($teacherId);

        $teacher->update([
            $request->key => $request->value
        ]);

        $teacher->slug = str_slug($teacher->name);
        $teacher->save();

        if ($request->ajax())
            return 'The teacher has been successfully edited.';
    }

    public function updateCategories(Request $request, Teacher $teacher)
    {
        $teacher->categories()->sync($request->value);

        if ($request->ajax())
            return 'The categories have been successfully edited.';
    }

    public function updateImage(Request $request, Teacher $teacher)
    {
        $newImage = imageToS3($request, 'teachers');

        if ($newImage) {
            $teacher->deleteImage();
            
            $teacher->update([
                'image_path' => $newImage
            ]);

            return back()->with('status', 'The teacher\'s profile picture has been successfully updated.');
        }
    }

    public function updateCover(Request $request, Teacher $teacher)
    {
        $newCover = coverToS3($request, 'teachers');

        if ($newCover) {
            $teacher->deleteCover();
            
            $teacher->update([
                'cover_path' => $newCover
            ]);

            return back()->with('status', 'The teacher\'s cover has been successfully updated.');
        }
    }
}
