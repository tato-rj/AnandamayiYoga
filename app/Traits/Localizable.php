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

	public function getTitleAttribute($title)
	{
		if (app()->getLocale() == 'pt')
			return $this->title_pt ?? $title;

		return $title;
	}

	public function getSubtitleAttribute($subtitle)
	{
		if (app()->getLocale() == 'pt')
			return $this->subtitle_pt ?? $subtitle;

		return $subtitle;
	}

	public function getContentAttribute($content)
	{
		if (app()->getLocale() == 'pt')
			return $this->content_pt ?? $content;

		return $content;
	}

	public function getDescriptionAttribute($description)
	{
		if (app()->getLocale() == 'pt')
			return $this->description_pt ?? $description;

		return $description;
	}

	public function getShortDescriptionAttribute($short_description)
	{
		if (app()->getLocale() == 'pt')
			return $this->short_description_pt ?? $short_description;

		return $short_description;
	}

	public function getLongDescriptionAttribute($long_description)
	{
		if (app()->getLocale() == 'pt')
			return $this->long_description_pt ?? $long_description;

		return $long_description;
	}

	public function getBiographyAttribute($biography)
	{
		if (app()->getLocale() == 'pt')
			return $this->biography_pt ?? $biography;

		return $biography;
	}
}
