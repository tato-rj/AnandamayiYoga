<?php

function slug_str($slug)
{
    return ucwords(str_replace('-', ' ', $slug));
}

function secondsToTime($seconds)
{
    if (! $seconds)
        return null;
    
    $duration = round($seconds);
    return sprintf('%02d:%02d', ($duration/3600),($duration/60%60));
}

function convertToTimeString($time, $format = null) 
{    
    if ($time < 1) {
        return;
    }
    $time = $time/60;
    $hours = floor($time / 60);
    $minutes = floor(($time % 60) /10) *10;

    $hoursToString = '%d '.str_plural('hour', $hours);
    $minutesToString = '%d '.str_plural('minute', $minutes);

    if ($hours < 1)
    	return sprintf($minutesToString, $minutes);

    if ($minutes < 10)
    	return sprintf($hoursToString, $hours);

    if (! $format)
        $format = "$hoursToString and $minutesToString";    

    return sprintf($format, $hours, $minutes);
}

function listToSentence($list)
{
    $count = count($list);
    $sentence = '';

    for ($i=0; $i<$count; $i++) {
        $sentence .= $list[$i];

        if ($i < $count - 2) {
            $sentence .= ', ';
        } else if ($i == $count - 2) {
            $sentence .= ' and ';
        } else {
            $sentence .= '.';
        }
    }

    return $sentence;
}

function stringToClass($string)
{
    return 'App\\'.ucfirst($string);
}

function classToString($class)
{
    $array = explode('\\', $class);

    return end($array);
}
