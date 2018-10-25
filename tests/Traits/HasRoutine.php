<?php

namespace Tests\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\{RoutineQuestionaire, User, Routine};

trait HasRoutine
{
	public function requestRoutine()
	{
		$request = $this->submitRoutine();

		return RoutineQuestionaire::latest()->first();
	}

	public function createRoutine($request)
	{
		Storage::fake('s3');
		
		$this->post('office/routines', [
			'request_id' => $request->id,
			'user_id' => $request->user->id,
			'comment' => 'A new comment',
			'video' => UploadedFile::fake()->image('video.jpg'),
			'schedule' => json_encode([
				"2017-04-24 00:00:00" => [
					"morning" => [create('App\Lesson')->id]
				],
				"2017-04-29 00:00:00" => [
					"afternoon" => [create('App\Lesson')->id, create('App\Lesson')->id]
				],
				"2017-05-02 00:00:00" => [
					"afternoon" => [create('App\Lesson')->id, create('App\Lesson')->id]
				],
				"2017-05-12 00:00:00" => [
					"evening" => [create('App\Lesson')->id]
				],
			])
		]);

		return Routine::where('user_id', $request->user->id)->first();
	}
}
