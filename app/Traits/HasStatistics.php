<?php

namespace App\Traits;

use App\UserRecord;
use Carbon\Carbon;

trait HasStatistics
{
    public function scopeYearly($query)
    {
        return $query->selectRaw('year(created_at) year, count(*) count')
                     ->groupBy('year')
                     ->orderByRaw('min(created_at)');
    }

    public function scopeMonthly($query)
    {
        return $query->selectRaw('month(created_at) month, year(created_at) year, count(*) count')
                     ->groupBy('year', 'month')
                     ->orderByRaw('min(created_at)');
    }

    public function scopeWeekly($query)
    {
        return $query->selectRaw('week(created_at) week, monthname(created_at) month, year(created_at) year, count(*) count')
                     ->groupBy('year', 'month', 'week')
                     ->orderByRaw('min(created_at)');
    }

    public function scopeDaily($query)
    {
        $results = $query->selectRaw('day(created_at) day, monthname(created_at) month, year(created_at) year, count(*) count')
                     ->groupBy('year', 'month', 'day')
                     ->orderByRaw('min(created_at)')
                     ->get();

        $firstDay = UserRecord::orderBy('created_at')->pluck('created_at')->first();

        $diffDays = Carbon::today()->diffInDays($firstDay);

        for ($i = $diffDays; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $day = $date->day;
            $month = $date->format('F');
            $year = $date->year;

            $calendar[$i] = [
                'day' => $day,
                'month' => $month,
                'year' => $year,
                'count' => 0,
            ];

            $record = $results->where('day', $day)->where('month', $month)->where('year', $year);

            if ($record->isNotEmpty())
                $calendar[$i]['count'] = $record->first()->count;
        }

        return array_slice($calendar, -10, 10);
    }
}
