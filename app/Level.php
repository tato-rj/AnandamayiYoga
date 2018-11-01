<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Localized;

class Level extends Model
{
	use Localized;
	
    public function lessons()
    {
    	return $this->hasMany(Lesson::class);
    }
}
