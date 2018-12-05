<?php

namespace App\Traits;

trait HasTeacher
{
    public function scopeAuthorized($query)
    {
        if (auth()->user()->isManager())
            return $query;

        if (get_class($this) == 'App\Course') {
            return $query->whereHas('teachers', function($q) {
                $q->where('id', auth()->user()->teacher->id);
            });
        }

        return $query->where('teacher_id', auth()->user()->teacher->id);
    }
}
