<?php

namespace App;

use App\Records\Records;

class Feedback extends Anandamayi
{
	protected $table = 'feedbacks';
    protected $guarded = [];
    static $types = ['experience', 'page', 'course', 'lesson', 'program'];    

    public static function types($exceptions = [])
    {
        $types = self::$types;
        $finalTypes = [];

        for ($i=0; $i<count($types) ;$i++) {
            if (! in_array($types[$i], $exceptions))
                array_push($finalTypes, $types[$i]); 
        }

        return $finalTypes;
    }

    public function user()
    {
        return User::where('email', $this->email)->first();
    }
    
    public function scopeStatistics($query)
    {
        return new Records($this);
    }

    public function scopeAbout($query, $subject)
    {
        return $query->where('about', $subject)->latest();
    }

    public function scopeFor($query, $model)
    {
        return $query->where('target_type', stringToClass($model))->latest();
    }

    public function scopeByModeL($query, $model, $email)
    {
        return $query->where([
            'target_type' => get_class($model),
            'target_id' => $model->id,
            'email' => $email]);
    }

    public function model()
    {
        if (! $this->target_type)
            return null;

        return $this->target_type::find($this->target_id);
    }
}
