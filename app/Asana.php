<?php

namespace App;

use App\Traits\{FindBySlug, Favoritable, InteractsWithCloud, Filterable};
use Illuminate\Support\Facades\Storage;

class Asana extends Anandamayi
{
    use FindBySlug, Favoritable, InteractsWithCloud, Filterable;

    protected $guarded = [];

    protected $with = ['benefits', 'steps'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($asana) {
            $asana->deleteImage();
            $asana->deleteVideo();
            $asana->types()->detach();
            $asana->subtypes()->detach();
            $asana->levels()->detach();
            $asana->favorited()->delete();
            $asana->benefits()->delete();
            $asana->steps()->delete();
        });
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }

    public function hasAllLevels()
    {
        return $this->levels()->count() == 3;
    }

    public function types()
    {
    	return $this->belongsToMany(AsanaType::class);
    }

    public function subtypes()
    {
        return $this->belongsToMany(AsanaSubType::class);
    }

    public function benefits()
    {
        return $this->hasMany(AsanaBenefit::class);
    }

    public function steps()
    {
        return $this->hasMany(AsanaStep::class);
    }

    public function typesIds()
    {
        return $this->types->pluck('id');
    }

    public function subtypesIds()
    {
        return $this->subtypes->pluck('id');
    }

    public function path()
    {
        return route('discover.asanas.show', $this->slug);
    }

    public function createMany($collection, $type)
    {
        foreach ($collection as $content) {
            if ($content != '')
                $this->$type()->create(['content' => $content]);
        }
    }

    public function levelsToString()
    {
        if ($this->levels->count() == 3)
            return 'All levels';

        return $this->levels->implode('name', ', ');
    }
}
