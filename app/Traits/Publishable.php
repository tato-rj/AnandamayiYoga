<?php

namespace App\Traits;

trait Publishable
{
	public function scopePublished($query)
	{
		return $query->whereNotNull('published');
	}

	public function updateStatus()
	{
        if ($this->published) {
            $this->update(['published' => null]);
        } else {
            $this->update(['published' => now()]);
        }
	}
}
