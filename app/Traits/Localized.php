<?php

namespace App\Traits;

trait Localized
{
	public function localize($field)
	{
		$lang = app()->getLocale() == 'pt' ? '_pt' : null;
		$value = $field.$lang;
		
		return $this->$value;
	}
}