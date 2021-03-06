<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Anandamayi extends Model
{
	protected $guarded = [];
	
	public function scopeExcept($query, $id)
	{
		return $query->where('id', '!=', $id);
	}
}
