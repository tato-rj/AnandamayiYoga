<?php

namespace App;

use App\Traits\Localized;

class Level extends Anandamayi
{
	use Localized;
	
    public function lessons()
    {
    	return $this->hasMany(Lesson::class);
    }
}
