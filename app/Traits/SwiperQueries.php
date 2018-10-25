<?php

namespace App\Traits;

trait SwiperQueries
{
	public static function trending($number)
	{
		return self::inRandomOrder()->limit($number)->get();
	}

	public static function recent($number)
	{
		return self::latest()->limit($number)->get();
	}

	public static function free($number)
	{
		return self::where('is_free', true)->limit($number)->get();
	}
}