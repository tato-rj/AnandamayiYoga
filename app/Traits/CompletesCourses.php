<?php

namespace App\Traits;

use App\Completable as CompletableModel;

trait CompletesCourses
{
    public function quizzes()
    {
        return $this->morphedByMany('App\Quiz', 'completable')->withPivot('answer')->withTimestamps();
    }

    public function assignments()
    {
        return $this->morphedByMany('App\Assignment', 'completable')->withPivot('answer')->withTimestamps();
    }

    public function lectures()
    {
        return $this->morphedByMany('App\Lecture', 'completable')->where('type', 'lecture')->withTimestamps();
    }

    public function demonstrations()
    {
        return $this->morphedByMany('App\Lecture', 'completable')->where('type', 'demonstration')->withTimestamps();
    }

    public function answerTo($model)
    {
        $relationship = str_plural($model->className);

        $model = $this->$relationship()->find($model->id);

        if (! $model)
            return null;

        $answer = $model->pivot->answer;
        
        return unserialize($answer);
    }

    public function dateCompleted($model)
    {
        $relationship = str_plural($model->type);

        $model = $this->$relationship()->find($model->id);

        if (! $model)
            return null;

        return $model->pivot->created_at;
    }
}
