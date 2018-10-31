<?php

function firstThree($string)
{
	return substr($string, 0, 3);
}

function splitName($name) {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
}

function getCurrency()
{
	return (app()->getLocale() == 'pt') ? 'brl' : 'usd';
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
