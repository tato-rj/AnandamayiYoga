<?php

function anandamayi()
{
    return \App\Teacher::anandamayi();
}

function slug_str($slug)
{
    return ucwords(str_replace('-', ' ', $slug));
}

function randomGreeting($type)
{
    $greetings = [
        'success' => ['Success!', 'Great!', 'Perfect!', 'Awesome!', 'Super!'],
        'danger' => ['Sorry!', 'Ops...', 'Hm...']
    ];

    if (! array_key_exists($type, $greetings))
        return null;

    return $greetings[$type][array_rand($greetings[$type])];
}

function cleanFileName($filename)
{
    return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
}

function highlight($route)
{
    return \Route::currentRouteName() == $route ? 'font-weight-bold' : null;
}

function limit($number, $limit = 99)
{
    return ($number > $limit) ? "$limit+" : $number;
}

function getCurrency()
{
	return (app()->getLocale() == 'pt') ? 'brl' : 'usd';
}

function percentage($total, $amount)
{
    if ($total == 0)
        return 0;
    
	return number_format(($amount/$total) * 100, 0);
}

function splitName($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
}

function cloudEnv() {
	return config('filesystems.disks.s3.env');
}

function cloud($path) {
	if (! $path)
		return asset('misc/no-image.png');
	
	return \Storage::disk('s3')->url($path);
}

function checkActive($paths, $class = 'navigation__active')
{
	foreach ($paths as $path) {
		if (Request::is($path))
			return $class;
	}
	
}

function firstThree($string)
{
	return substr($string, 0, 3);
}

function weekDay($number)
{	
    return config('routine.weekDays')[$number%7];
}

function generateCalendar($from, $days)
{
	return $from->startOfWeek()->addDays($days);
}

function attachmentToS3($request, $folder)
{
    if (! $request->file('attachment')) return null;

    return $request->file('attachment')->store(cloudEnv()."{$folder}", 's3');
}

function coverToS3($request, $folder)
{
    if (! $request->file('cover')) return null;

    return $request->file('cover')->store(cloudEnv()."/{$folder}/covers", 's3');
}

function imageToS3($request, $folder)
{
	if (! $request->file('image')) return null;

	return $request->file('image')->store(cloudEnv()."/{$folder}/images", 's3');
}

function videoToS3($request, $folder)
{
	if (! $request->file('video')) return null;

	return $request->file('video')->store(cloudEnv()."/{$folder}/videos", 's3');
}

function fileToS3($request, $folder)
{
    if (! $request->file('file')) return null;

    return $request->file('file')->store(cloudEnv()."/{$folder}/files", 's3');
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

function priceToCurrency($currency, $price)
{
    $symbols = [
    	'usd' => '$',
    	'brl' => 'R$',
    	'eur' => '€',
    	'gbp' => '‎£'
    ];

    $symbol = array_key_exists($currency, $symbols) ? $symbols[$currency] : '$';

    return "{$symbol}".number_format(($price /100), 2, '.', ' ');
}

function getRoutes($folders)
{
    foreach ($folders as $content) {
        $contentArray = explode('.', $content);
        $folder = $contentArray[0];
        $groups = explode('|', $contentArray[1]);

        foreach ($groups as $file) {
            require base_path("routes/{$folder}/{$file}.php");
        }
    }
}

function secondsToTime($seconds)
{
    if (! $seconds)
        return null;
    
    $duration = round($seconds);
    return sprintf('%02d:%02d', ($duration/3600),($duration/60%60));
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
