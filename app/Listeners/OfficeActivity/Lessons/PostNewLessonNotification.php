<?php

namespace App\Listeners\OfficeActivity\Lessons;

use App\User;
use App\Events\LessonCreated;
use App\Notifications\Users\ManagerCommunication\NewLessonNotification;
use App\Notifications\Teachers\LessonPublishedNotification;

class PostNewLessonNotification
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
     * @param  LessonCreated  $event
     * @return void
     */
    public function handle(LessonCreated $event)
    {
        
        $users = User::hasCategories($event->lesson->categories()->pluck('id'));
dd($event->lesson->categories()->pluck('id'));
        $users->each(function($user) use ($event) {
            $user->notify(new NewLessonNotification($user, $event->lesson));
        });

        if ($event->lesson->teacher()->exists())
            $event->lesson->teacher->notify(new LessonPublishedNotification($event->lesson));
    }
}
