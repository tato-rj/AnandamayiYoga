<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasStatistics;
use App\Records\Records;

class UserRecord extends Model
{
    use HasStatistics;

    protected $guarded = [];
    protected $casts = [
        'confirmed' => 'boolean',
        'is_member' => 'boolean',
        'deleted' => 'boolean'
    ];

    public static function new($userId)
    {
    	self::firstOrCreate(['user_id' => $userId]);
    }

    public static function confirm($userId)
    {
    	self::where('user_id', $userId)->update([
    		'confirmed' => true
    	]);
    }

    public static function membership($userId)
    {
        self::where('user_id', $userId)->update([
            'is_member' => true
        ]);
    }

    public static function markDeleted($userId)
    {
        self::where('user_id', $userId)->update([
            'deleted' => true
        ]);        
    }

    public function scopeStatistics($query)
    {
        return new Records($this);
    }
}
