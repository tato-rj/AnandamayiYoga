<?php

namespace App;

use App\Traits\FindBySlug;

class AsanaType extends Anandamayi
{
	use FindBySlug;

	protected $guarded =[];
	protected $withCount = ['asanas'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($type) {
            $type->asanas()->detach();
        });
    }

	public function asanas()
	{
		return $this->belongsToMany(Asana::class);
	}
}
