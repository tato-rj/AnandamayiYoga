<?php

namespace App\Listeners\OfficeActivity\Courses;

use App\Events\CourseCreated;
use App\Notifications\Teachers\CoursePublishedNotification;

class AnnouncePublication
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CourseCreated  $event
     * @return void
     */
    public function handle(CourseCreated $event)
    {
        $event->course->teachers->each(function($teacher) use ($event) {
            $teacher->notify(new CoursePublishedNotification($event->course, $teacher));
        });
    }
}
