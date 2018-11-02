<?php

namespace App;

class Answer extends Anandamayi
{
    protected $guarded = [];
    protected $casts = ['is_correct' => 'boolean'];

    public function isReviewed()
    {
    	return $this->is_correct !== null;
    }
}
