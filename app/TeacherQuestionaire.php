<?php

namespace App;

use App\Traits\Publishable;

class TeacherQuestionaire extends Anandamayi
{
    use Publishable;
    
    protected $dates = ['published'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getQuestionsArrayAttribute()
    {
        $array = [];

        for ($i = 0; $i < count($this->questions_en); $i++) {
            $array[$i]['en'] = $this->questions_en[$i];
            $array[$i]['pt'] = $this->questions_pt[$i];
        }

        return $array;    
    }

    public function getQuestionsLocaleAttribute()
    {
        if (app()->getLocale() == 'pt')
            return $this->questions_pt;

    	return $this->questions_en;
    }

    public function getQuestionsEnAttribute()
    {
        return json_decode(unserialize($this->questions));
    }    

    public function getQuestionsPtAttribute($questions_pt)
    {
    	return json_decode(unserialize($questions_pt));
    }

    public function getQuestionsCountAttribute()
    {
    	return count($this->questions_en);
    }
}
