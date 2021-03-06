<?php

namespace App\Http\Controllers\Asanas;

use App\AsanaSubType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsanaSubTypesController extends Controller
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
            'name' => 'required|unique:asana_sub_types'
        ]);
        
        $subtype = AsanaSubType::firstOrCreate([
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'name_pt' => $request->name_pt ?? null
        ]);

        return back()->with('status', "The asana sub type {$subtype->name} has been successfully created.");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asanaSubtypeId)
    {
        $asanaSubtype = AsanaSubType::find($asanaSubtypeId);

        $asanaSubtype->update([
            $request->key => $request->value
        ]);

        $asanaSubtype->slug = str_slug($asanaSubtype->name);
        $asanaSubtype->save();

        if ($request->ajax())
            return 'The asana subtype has been successfully edited';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($asanaSubtypeId)
    {
        AsanaSubType::find($asanaSubtypeId)->delete();

        return back()->with('status', 'The asana sub type has been deleted.');
    }
}
