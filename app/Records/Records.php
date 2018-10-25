<?php

namespace App\Records;

use Carbon\Carbon;

class Records extends AppStats
{
	public function daily()
	{
		$dbQuery = $this->getDailyRecords();
		$firstDate = $this->getFirstDate();

        for ($i = Carbon::today()->diffInDays($firstDate); $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);

            $calendar[$i] = $this->insertDateOnCalendar($date);

            $record = $this->getSingleDayRecord($dbQuery, $date);

            if ($record->isNotEmpty())
                $calendar[$i]['count'] = $record->first()->count;
        }		

        $this->calendar = $calendar;

        return $this;
	}

	public function monthly()
	{
		$dbQuery = $this->getMonthlyRecords();
		$firstDate = $this->getFirstDate();
		
        for ($i = Carbon::today()->diffInMonths($firstDate)+1; $i >= 0; $i--) {
            $date = Carbon::today()->subMonths($i);

            $calendar[$i] = $this->insertDateOnCalendar($date);

            $record = $this->getSingleMonthRecord($dbQuery, $date);

            if ($record->isNotEmpty())
                $calendar[$i]['count'] = $record->first()->count;
        }		

        $this->calendar = $calendar;

        return $this;
	}

	public function yearly()
	{
		$dbQuery = $this->getYearlyRecords();
		$firstDate = $this->getFirstDate();

        for ($i = Carbon::today()->diffInYears($firstDate); $i >= 0; $i--) {
            $date = Carbon::today()->subYears($i);

            $calendar[$i] = $this->insertDateOnCalendar($date);

            $record = $this->getSingleYearRecord($dbQuery, $date);

            if ($record->isNotEmpty())
                $calendar[$i]['count'] = $record->first()->count;
        }		

        $this->calendar = $calendar;

        return $this;
	}

	public function take($number)
	{
		$this->results = array_slice($this->calendar, $number*-1, $number);

		return $this;
	}

	public function get()
	{
		return $this->results;
	}
}
