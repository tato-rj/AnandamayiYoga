<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];
    static $lists = ['newsletter', 'promo', 'journey'];

    public static function lists($exceptions = [])
    {
    	$lists = self::$lists;
    	$finalList = [];

    	for ($i=0; $i<count($lists) ;$i++) {
			if (! in_array($lists[$i], $exceptions))
				array_push($finalList, $lists[$i]);	
    	}

    	return $finalList;
    }

    public function user()
    {
        return User::where('email', $this->email)->first();
    }

    static function createOrFail($email, $list)
    {
    	$record = [
    		'email' => $email,
    		'list' => strtolower($list)
    	];

    	if (! self::where($record)->exists())
    		return self::create($record);

    	return null;
    }

    public function scopeNewsletter($query)
    {
    	return $query->where('list', 'newsletter');
    }

    public function scopeJourney($query)
    {
    	return $query->where('list', 'journey');
    }

    public function scopePromo($query)
    {
    	return $query->where('list', 'promo');
    }

    public function scopeContains($query, $email)
    {
    	return $query->where('email', $email)->exists();
    }
}
