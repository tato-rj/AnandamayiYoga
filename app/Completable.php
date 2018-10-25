<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Completable extends Model
{
    protected $guarded = [];

    public function getAnswerAttribute($answer)
    {
        return unserialize($answer);
    }
}
