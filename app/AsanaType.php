<?php

namespace App;

use App\Traits\{FindBySlug, Localizable};

class AsanaType extends Anandamayi
{
	use FindBySlug, Localizable;

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
