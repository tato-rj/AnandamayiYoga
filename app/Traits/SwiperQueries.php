<?php

namespace App\Traits;

trait SwiperQueries
{
	public function scopeTrending($query, $number)
	{
		return $query->inRandomOrder()->limit($number)->get();
	}

	public function scopeRecent($query, $number)
	{
		return $query->latest()->limit($number)->get();
	}

	public function scopeFree($query, $number)
	{
		return $query->where('is_free', true)->limit($number)->get();
	}
}