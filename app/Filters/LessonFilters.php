<?php

namespace App\Filters;

class LessonFilters extends Filters
{
	protected $filters = ['categories', 'levels', 'duration', 'cost'];

	public function categories($categories)
	{
		return $this->builder->whereHas('categories', function ($query) use ($categories) {
			$query->whereIn('slug', $categories);
        });		
	}

	public function levels($levels)
	{
		return $this->builder->whereHas('levels', function ($query) use ($levels) {
			$query->whereIn('name', $levels);
        });		
	}

	public function duration($duration)
	{
		return $this->builder->where('duration', '<', $duration);
	}

	public function cost($cost)
	{
		return $this->builder->where('is_free', $cost);
	}
}
