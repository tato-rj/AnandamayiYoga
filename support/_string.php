<?php

function firstThree($string)
{
	return substr($string, 0, 3);
}

function preview($text, $length)
{
    $text = strip_tags($text);
    preg_match("/(?:\w+(?:\W+|$)){0,$length}/", $text, $matches);
    return $matches[0];
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

    $greeting = $greetings[$type][array_rand($greetings[$type])];

    return __($greeting);
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

function randomColor()
{
    $colors = ['#f6993f', '#38c172', '#4dc0b5', '#3490dc', '#6574cd', '#9561e2', '#f66d9b'];
    return $colors[array_rand($colors)];   
}
