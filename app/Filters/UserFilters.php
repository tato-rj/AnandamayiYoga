<?php

namespace App\Filters;

use Carbon\Carbon;

class UserFilters extends Filters
{
	protected $filters = ['order', 'status'];
	protected $order = ['name', 'newest', 'oldest'];
	protected $status = ['unconfirmed', 'trial', 'active', 'membership_expired', 'trial_expired', 'graceperiod'];


	public function order($order)
	{
		$order = $order[0];

		if (in_array($order, $this->order)) {
			$this->$order($order[0]);
		}
	}

	public function name($order)
	{
		return $this->builder->orderBy('first_name', 'ASC');
	}

	public function oldest($order)
	{
		return $this->builder->orderBy('created_at', 'ASC');
	}

	public function newest($order)
	{
		return $this->builder->orderBy('created_at', 'DESC');
	}

	public function status($status)
	{
		$status = $status[0];

		if (in_array($status, $this->status)) {
			$this->$status($status[0]);
		}
	}

	public function unconfirmed($categories)
	{
		return $this->builder->where('confirmed', 0);		
	}

	public function trial($duration)
	{
		return $this->builder->whereNotNull('trial_ends_at')->where('trial_ends_at', '>=', Carbon::now());
	}

	public function active($levels)
	{
		return $this->builder->whereHas('membership', function ($query) {
			$query->where('active', 1);
        });		
	}

	public function membership_expired($levels)
	{
		return $this->builder->whereHas('membership', function ($query) {
			$query->where('active', 0)->where('subscription_ends_at', '<', Carbon::now());
        });
	}

	public function trial_expired($levels)
	{
		return $this->builder->where('trial_ends_at', '<', Carbon::now());		
	}

	public function graceperiod($cost)
	{
		return $this->builder->whereHas('membership', function ($query) {
			$query->where('active', 0)->where('subscription_ends_at', '>=', Carbon::now());
        });
	}
}
