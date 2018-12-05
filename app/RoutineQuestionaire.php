<?php

namespace App;

use Carbon\Carbon;
use App\Traits\HasTeacher;

class RoutineQuestionaire extends Anandamayi
{
    use HasTeacher;
    
    protected $guarded = [];
    protected $with = ['user'];
    protected $casts = [
        'schedule' => 'json',
        'categories' => 'json',
        'practice' => 'json',
        'physical' => 'json',
        'mental' => 'json',
        'spiritual' => 'json',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopePending($query)
    {
    	return $query->whereNull('completed_at');
    }

    public function publish()
    {
        $this->completed_at = Carbon::now();
        $this->save();
    }

    public function withSchedule()
    {
        $dates = [];
        $schedule = json_decode($this->schedule, true);

        foreach ($schedule as $date) {
            $date = Carbon::now()->startOfWeek()->addDays($date['day']);
            array_push($dates, $date);
        }
        
        $this->first_week = $dates;

        return $this;       
    }

    public function getDay($weekIndex)
    {
        return $this->first_week[$weekIndex]->addWeeks($weekIndex);
    }

    public function scopeNew($query)
    {
        return $query->whereNull('completed_at');
    }
}
