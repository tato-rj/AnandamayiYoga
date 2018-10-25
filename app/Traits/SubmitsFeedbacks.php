<?php

namespace App\Traits;

use App\Feedback;

trait SubmitsFeedbacks
{
    public function hasFeedbackFor($model)
    {
        return Feedback::byModel($model, $this->email)->exists();
    }

    public function latestFeedbackFor($model)
    {
        return Feedback::byModel($model, $this->email)->latest()->first();
    }
}

