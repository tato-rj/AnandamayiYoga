<?php

namespace App\Records;

use Carbon\Carbon;

abstract class AppStats
{
	protected $model, $calendar, $results, $total;

	public function __construct($model)
	{
		$this->model = $model;
        $this->total = $model->count();
	}

	public function getDailyRecords()
	{
        $results = $this->model::selectRaw('day(created_at) day, monthname(created_at) month, year(created_at) year, count(*) count')
                    ->groupBy('year', 'month', 'day')
                    ->orderByRaw('min(created_at)')
                    ->get();

        return $results;	
	}

	public function getMonthlyRecords()
	{
        $results = $this->model::selectRaw('monthname(created_at) month, year(created_at) year, count(*) count')
                    ->groupBy('year', 'month')
                    ->orderByRaw('min(created_at)')
                    ->get();

        return $results;	
	}

	public function getYearlyRecords()
	{
        $results = $this->model::selectRaw('year(created_at) year, count(*) count')
                    ->groupBy('year')
                    ->orderByRaw('min(created_at)')
                    ->get();

        return $results;	
	}

	public function getSingleDayRecord($dbQuery, $date)
	{
		return $dbQuery->where('day', $date->day)->where('month', $date->format('F'))->where('year', $date->year);
	}

    public function getSingleMonthRecord($dbQuery, $date)
    {
        return $dbQuery->where('month', $date->format('F'))->where('year', $date->year);
    }

    public function getSingleYearRecord($dbQuery, $date)
    {
        return $dbQuery->where('year', $date->year);
    }

	public function insertDateOnCalendar($date)
	{
        return [
                'day' => $date->day,
                'month' => $date->format('F'),
                'year' => $date->year,
                'count' => 0,
            ];
	}

	public function getFirstDate()
	{
        $firstDay = $this->model::orderBy('created_at')->pluck('created_at')->first();

        return Carbon::parse($firstDay);		
	}
    
    public function percentage($value)
    {
        return round($value*100/$this->total);
    }
}
