<?php

namespace App;

use App\Traits\Localizable;

class Level extends Anandamayi
{
	use Localizable;
	
    public function lessons()
    {
    	return $this->hasMany(Lesson::class);
    }

    public function getSlugName()
    {
    	return $this->name;
    }
}
