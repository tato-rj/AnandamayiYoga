<?php

function weekDay($number)
{	
    return config('routine.weekDays')[$number%7];
}

function generateCalendar($from, $days)
{
	return $from->startOfWeek()->addDays($days);
}
