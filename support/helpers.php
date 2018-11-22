<?php

require '_cloud.php';
require '_calendar.php';
require '_conversion.php';
require '_string.php';
require '_lorem.php';

function anandamayi()
{
    return \App\Teacher::anandamayi();
}

function highlight($route)
{
    return \Route::currentRouteName() == $route ? 'font-weight-bold' : null;
}

function limit($number, $limit = 99)
{
    return ($number > $limit) ? "$limit+" : $number;
}

function percentage($total, $amount)
{
    if ($total == 0)
        return 0;
    
	return number_format(($amount/$total) * 100, 0);
}

function checkActive($paths, $class = 'navigation__active')
{
	foreach ($paths as $path) {
		if (Request::is($path))
			return $class;
	}
	
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
