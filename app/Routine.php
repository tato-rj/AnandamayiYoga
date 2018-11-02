<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Routine extends Anandamayi
{
    protected $guarded = [];
    protected $with = ['schedules', 'user'];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($routine) {
            $routine->deleteVideo();
            $routine->schedules()->delete();
            $routine->questionaire()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
    	return $this->hasMany(Schedule::class);
    }

    public function lessons()
    {
        return $this->schedules->pluck('lesson.slug');
    }

    public function questionaire()
    {
        return $this->belongsTo(RoutineQuestionaire::class, 'request_id');
    }

    public function deleteVideo()
    {
        Storage::disk('s3')->delete($this->video_path);
    }

    public function start()
    {
        $this->started_at = Carbon::now();
        $this->save();
    }

    public function complete()
    {
        $this->completed_at = Carbon::now();
        $this->save();
    }

    public function getStartsAtAttribute()
    {
        return $this->schedules()->first()->day;
    }
}
