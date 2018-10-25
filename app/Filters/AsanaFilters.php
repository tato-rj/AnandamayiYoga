<?php

namespace App\Filters;

class AsanaFilters extends Filters
{
	protected $filters = ['types', 'subtypes', 'levels', 'search'];

	public function types($types)
	{
		return $this->builder->whereHas('types', function ($query) use ($types) {
			$query->whereIn('slug', $types);
        });		
	}

	public function subtypes($subtypes)
	{
		return $this->builder->whereHas('subtypes', function ($query) use ($subtypes) {
			$query->whereIn('slug', $subtypes);
        });		
	}

	public function levels($levels)
	{
		return $this->builder->whereHas('levels', function ($query) use ($levels) {
			$query->whereIn('name', $levels);
        });		
	}

	public function search($search)
	{
		$results = $this->builder->where('name', 'like', "%$search[0]%");
		
		array_shift($search);
		
		foreach ($search as $input) {
			$results->orWhere('also_known_as', 'like', "%$input%");
		}

		return $results;
	}
}
