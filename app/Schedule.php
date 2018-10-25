<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];
    protected $with = ['lesson'];
    protected $dates = ['day'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }

    public function getSortingDayAttribute()
    {
        return $this->day->format('Y-m-d');
    }

    public function getPathAttribute()
    {
        return "/members/routines/{$this->routine->id}/{$this->lesson->slug}";
    }

    public static function createFrom($routine, $schedule)
    {
        $requestSchedule = json_decode($schedule);

        foreach ($requestSchedule as $day => $lessons) {            
            foreach ($lessons as $time => $lessonsId) {
                for ($i = 0; $i < count($lessonsId); $i++) {
                    self::create([
                        'routine_id' => $routine->id,
                        'lesson_id' => $lessonsId[$i],
                        'day' => Carbon::parse($day),
                        'time' => $time
                    ]);
                }
            }
        }
    }

    public static function nextFourDays()
    {
        return [
            [
                'label' => 'TODAY',
                'day' => Carbon::now()
            ],
            [
                'label' => 'TOMORROW',
                'day' => Carbon::now()->addDays(1)
            ],
            [
                'label' => Carbon::now()->addDays(2)->format('l jS'),
                'day' => Carbon::now()->addDays(2)
            ],
            [
                'label' => Carbon::now()->addDays(3)->format('l jS'),
                'day' => Carbon::now()->addDays(3)
            ]            
        ];
    }
}
