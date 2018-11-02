<?php

namespace App;

use App\Events\CourseCreated;
use App\Traits\{FindBySlug, InteractsWithCloud};

class Course extends Anandamayi
{
	use FindBySlug, InteractsWithCloud;

	protected $guarded = [];
    protected $with = ['chapters'];
    protected $casts = [
        'published' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($course) {
            $course->chapters->each->delete();
            $course->deleteImage();
            $course->deleteVideo();
        });
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function chapters()
    {
    	return $this->hasMany(Chapter::class)->orderBy('order');
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class)->latest();
    }

    public function progress()
    {
        if (! auth()->check())
            return false;

        $chapters = $this->chapters()->pluck('id')->toArray();

        $lectures = auth()->user()->lectures()->whereIn('chapter_id', $chapters)->pluck('duration');
        $demonstrations = auth()->user()->demonstrations()->whereIn('chapter_id', $chapters)->pluck('duration');

        $videosCompleted = $lectures->merge($demonstrations)->sum();

        return percentage(
            $this->duration(),
            $videosCompleted
        );
    }

    public function publish()
    {
        event(new CourseCreated($this));
        
        return $this->update(['published' => 1]);
    }

    public function unpublish()
    {
        return $this->update(['published' => 0]);        
    }

    public function duration()
    {
        $duration = 0;

        foreach ($this->chapters as $chapter) {
            $duration += $chapter->duration();
        }

        return $duration;
    }

    public function image()
    {
    	return asset("images/backgrounds/courses/{$this->slug}.jpg");
    }

    public function teachersList()
    {
        $names = [];
        
        foreach ($this->teachers as $teacher) {
            array_push($names, $teacher->name);
        }

        return implode(', ', $names);
    }

    // RECONSIDER
    public function manageChapter($data, $request)
    {
        if ($data['id']) {
            $chapter = $this->chapters()->find($data['id']);

            $chapter->update([
                'name' => $data['chapter_name'],
                'description' => $data['chapter_description']
            ]);

            $chapter->saveAny($data['items']);
            
            if ($request->ajax())
                return 'The chapter has been successfully updated.';

        } else {
            $chapter = $this->chapters()->create([
                'name' => $data['chapter_name'],
                'description' => $data['chapter_description'],
                'order' => $data['chapter_order']
            ]);

            $chapter->saveAny($data['items']);

            if ($request->ajax())
                return 'The chapter has been successfully created.';
        }
    }

    public function reorderChapters()
    {
        $chapters = $this->fresh()->chapters;

        for ($i = 0; $i < $chapters->count(); $i++) {
            $this->chapters()
                 ->find($chapters[$i]->id)
                 ->update(['order' => $i]);
        }
    }

    public function orderChapters($request)
    {
        foreach ($request as $data) {
            $this->chapters()->find($data['id'])->update(['order' => $data['order']]);
        }   
    }
}
