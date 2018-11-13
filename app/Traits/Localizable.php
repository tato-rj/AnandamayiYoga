<?php

namespace App\Traits;

trait Localizable
{
	public function getNameAttribute($name)
	{
		if (app()->getLocale() == 'pt')
			return $this->name_pt ?? $name;

		return $name;
	}

	public function getSubtitleAttribute($subtitle)
	{
		if (app()->getLocale() == 'pt')
			return $this->subtitle_pt ?? $subtitle;

		return $subtitle;
	}

	public function getDescriptionAttribute($description)
	{
		if (app()->getLocale() == 'pt')
			return $this->description_pt ?? $description;

		return $description;
	}

	public function getBiographyAttribute($biography)
	{
		if (app()->getLocale() == 'pt')
			return $this->biography_pt ?? $biography;

		return $biography;
	}
}
