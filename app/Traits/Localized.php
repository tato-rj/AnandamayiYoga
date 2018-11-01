<?php

namespace App\Traits;

trait Localized
{
	protected $lang;

	public function __construct()
	{
		$this->lang = app()->getLocale() == 'pt' ? '_pt' : null;
	}

	public function localize($field)
	{
		$value = $field.$this->lang;
		return $this->$value;
	}
}