<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Completable;

class Quiz extends Model
{
    use Completable;
    
    protected $guarded = [];

    public function chapter()
    {
    	return $this->belongsTo(Chapter::class);
    }

    public function answers()
    {
    	return $this->morphMany(Answer::class, 'answerable');
    }

    public function getTypeAttribute()
    {
    	return 'quiz';
    }

    public function getClassNameAttribute()
    {
        return 'quiz';
    }

    public function getQuestionsAttribute()
    {
        return unserialize($this->content);
    }

    public function getFeedback($answers, $bool = false)
    {
        $feedback = [];

        for ($i=0; $i<count($this->questions); $i++) {            
            $correctAnswers = $this->questions[$i]['answers']['correct'];

            if (array_key_exists($answers[$i], $correctAnswers)) {
                $feedback[$i] = $bool ? true : 1;
            } else {
                $feedback[$i] = $bool ? false : 0;
            }
        }

        return $feedback;
    }
}
