<?php

namespace App\Billing;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];
    protected $casts = [
        'paid' => 'boolean',
        'is_refund' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUsdAttribute()
    {
    	return '$' . number_format($this->amount / 100, 2);
    }

    public function last()
    {
    	return $this->latest()->first();
    }

    public function getDateAttribute()
    {
        return $this->created_at->toFormattedDateString();
    }

    public function getStatusAttribute()
    {
        return ($this->paid) ? '<span class="text-success">Paid</span>' : '<span class="text-danger">Failed</span>';
    }
}
