<?php

namespace App\Traits;

trait Publishable
{
	public function updateStatus()
	{
        if ($this->published) {
            $this->update(['published' => null]);
        } else {
            $this->update(['published' => now()]);
        }
	}
}
