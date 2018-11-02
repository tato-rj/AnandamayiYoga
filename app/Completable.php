<?php

namespace App;

class Completable extends Anandamayi
{
    protected $guarded = [];

    public function getAnswerAttribute($answer)
    {
        return unserialize($answer);
    }
}
