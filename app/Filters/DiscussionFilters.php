<?php

namespace App\Filters;

class DiscussionFilters extends Filters
{
	protected $filters = ['chapter'];

	public function chapter($chapter)
	{
		return $this->builder->where('chapter_id', $chapter);		
	}
}
