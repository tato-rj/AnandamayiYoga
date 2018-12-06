<?php

namespace App;

class TeacherQuestionaire extends Anandamayi
{
    public function getQuestionsAttribute($questions)
    {
    	return json_decode(unserialize($questions));
    }
}
