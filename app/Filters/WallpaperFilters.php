<?php

namespace App\Filters;

class WallpaperFilters extends Filters
{
	protected $filters = ['category'];

	public function category($category)
	{
		return $this->builder->where('category_id', $category);		
	}
}
