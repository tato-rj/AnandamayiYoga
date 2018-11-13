<?php

namespace App;

use App\Traits\{FindBySlug, Localizable};

class AsanaSubType extends Anandamayi
{
	use FindBySlug, Localizable;

	protected $guarded =[];
	protected $withCount = ['asanas'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($subtype) {
            $subtype->asanas()->detach();
        });
    }

	public function asanas()
	{
		return $this->belongsToMany(Asana::class);
	}
}
