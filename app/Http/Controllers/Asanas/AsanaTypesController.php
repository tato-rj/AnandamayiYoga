<?php

namespace App\Http\Controllers\Asanas;

use App\AsanaType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsanaTypesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:asana_types'
        ]);
        
        $type = AsanaType::firstOrCreate([
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'name_pt' => $request->name_pt ?? null
        ]);

        return back()->with('status', "The asana type {$type->name} has been successfully created.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asanaTypeId)
    {
        $asanaType = AsanaType::find($asanaTypeId);

        $asanaType->update([
            $request->key => $request->value
        ]);

        $asanaType->slug = str_slug($asanaType->name);
        $asanaType->save();

        if ($request->ajax())
            return 'The asana type has been successfully edited';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($asanaTypeId)
    {
        $type = AsanaType::find($asanaTypeId);

        if ($type)
            $type->delete();

        return back()->with('status', 'The asana type has been deleted.');
    }
}
