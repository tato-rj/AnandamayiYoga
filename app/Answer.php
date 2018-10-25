<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];
    protected $casts = ['is_correct' => 'boolean'];

    public function isReviewed()
    {
    	return $this->is_correct !== null;
    }
}
