<?php

namespace Tests\Unit;

use Tests\AppTest;

class WallpaperTest extends AppTest
{
	/** @test */
	public function it_belongs_to_a_category()
	{
		$wallpaper = create('App\Wallpaper');

		$this->assertInstanceOf('App\WallpaperCategory', $wallpaper->category);
	}

	/** @test */
	public function it_knows_the_number_of_downloads()
	{
		$wallpaper = create('App\Wallpaper');

		$this->assertEquals(0, $wallpaper->downloads_count);

		$wallpaper->increment('downloads_count');

		$this->assertEquals(1, $wallpaper->downloads_count);
	}
}
