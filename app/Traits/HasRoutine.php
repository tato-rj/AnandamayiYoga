<?php

namespace App\Traits;

trait HasRoutine
{
    public function classesOn($date)
    {
    	$result = $this->activeRoutine()->schedules->filter(function($item) use ($date) {
        	return $item->day->isSameDay($date);
        });
        
        return $result;
    }

    public function startedRoutine()
    {
        return !! $this->activeRoutine()->started_at;
    }

    public function completedRoutines()
    {
        return $this->routines()->whereNotNull('completed_at');
    }

    public function activeRoutine()
    {
        return $this->routines()->whereNull('completed_at')->first();     
    }
}
