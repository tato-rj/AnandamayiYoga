<?php

namespace App\Records;

class Stats extends AppStats
{
	public function gender()
	{
		$noGender = $this->model->whereNull('gender')->count();
		$male = $this->model->where('gender', 'male')->count();
		$female = $this->model->where('gender', 'female')->count();

		return [$this->percentage($noGender), $this->percentage($male), $this->percentage($female)];
	}

	public function status()
	{
		$unconfirmed = $this->model->where('confirmed', 0)->count();

		$onTrial = $this->model->whereDate('trial_ends_at', '>=', date('Y-m-d'))->count();
		
		$member = $this->model->whereHas('membership', function($query) {
			$query->whereNull('subscription_ends_at'); 
		})->count();
		
		$gracePeriod = $this->model->whereHas('membership', function($query) {
			$query->whereNotNull('subscription_ends_at'); 
		})->count();

		$inactive = $this->model->whereHas('membership', function($query) {
			$query->whereDate('subscription_ends_at', '<', date('Y-m-d')); 
		})->count();

		return [
			$this->percentage($unconfirmed), 
			$this->percentage($onTrial), 
			$this->percentage($member), 
			$this->percentage($gracePeriod), 
			$this->percentage($inactive)
		];
	}

	public function level()
	{
		$noLevel = $this->model->whereNull('level_id')->count();
		$beginner = $this->model->where('level_id', 1)->count();
		$intermediate = $this->model->where('level_id', 2)->count();
		$advanced = $this->model->where('level_id', 3)->count();

		return [$this->percentage($noLevel), $this->percentage($beginner), $this->percentage($intermediate), $this->percentage($advanced)];
	}

	public function routine()
	{
		$hasRoutine = $this->model->whereHas('routines')->count();
		$hasNotRoutine = $this->total - $hasRoutine;

		return [$this->percentage($hasRoutine), $this->percentage($hasNotRoutine)];
	}
}
