<?php

namespace App\Billing;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
	protected $guarded = [];
    protected $dates = ['expires_at'];

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function redeem()
    {
    	if ($this->isExpired())
	    	return null;

    	if ($this->hasReachedLimit())
    		return null;

    	$this->increment('redeemed_count');

    	return $this;
    }

    public function isExpired()
    {
    	return $this->expires_at && $this->expires_at->lte(Carbon::now());
    }

    public function hasReachedLimit()
    {
    	return $this->limit && $this->redeemed_count == $this->limit;
    }

    public function scopeValidate($query, $code)
    {
        $request = $query->where('code', $code)->first();

        if (! $request || $request->isExpired() || $request->hasReachedLimit())
            return false;

        return true;
    }
}
