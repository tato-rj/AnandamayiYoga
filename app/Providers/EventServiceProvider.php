<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserSignedUp' => [
            'App\Listeners\Signups\CreateRecord',
            'App\Listeners\Signups\EmailConfirmation\SendRequest'
        ],
        'App\Events\UserConfirmedEmail' => [
            'App\Listeners\Signups\NotifyAdmin',
            'App\Listeners\Signups\NotifyUser',
            'App\Listeners\Signups\EmailConfirmation\CreateRecord'
        ],
        'App\Events\UserChangesAvatar' => [
            'App\Listeners\UserActivity\Avatars\NotifyAdmin'
        ],
        'App\Events\UserJoinedMembership' => [
            'App\Listeners\Memberships\NewMembership\CreateRecord',
            'App\Listeners\Memberships\NewMembership\EndTrialPeriod',
            'App\Listeners\Memberships\NewMembership\NotifyUser',
            'App\Listeners\Memberships\NewMembership\NotifyAdmin'
        ],
        'App\Events\UserCanceledMembership' => [
            'App\Listeners\Memberships\CanceledMembership\NotifyUser',
            'App\Listeners\Memberships\CanceledMembership\NotifyAdmin'
        ],
        'App\Events\UserResumedMembership' => [
            'App\Listeners\Memberships\ResumedMembership\NotifyUser',
            'App\Listeners\Memberships\ResumedMembership\NotifyAdmin'
        ],
        'App\Events\UserRemoved' => [
            'App\Listeners\DeletedAccounts\NotifyAdmin',
            'App\Listeners\DeletedAccounts\NotifyUser'
        ],
        'App\Events\Purchases\CoursePurchased' => [
            'App\Listeners\Purchases\Course\NotifyUser'
        ],
        'App\Events\Routines\RoutineRequested' => [
            'App\Listeners\Routines\NewRequest\NotifyUser',
        ],
        'App\Events\RoutineCreated' => [
            'App\Listeners\Routines\Publish\NotifyUser'
        ],
        'App\Events\Routines\StartRoutine' => [
            'App\Listeners\Routines\PostRoutineStartNotification'
        ],
        'App\Events\Subscription' => [
            'App\Listeners\Subscriptions\SendWelcomeToNewsletterEmail'
        ],
        'App\Events\LessonCreated' => [
            'App\Listeners\OfficeActivity\Lessons\PostNewLessonNotification'
        ],
        'App\Events\ProgramCreated' => [
            'App\Listeners\OfficeActivity\Programs\PostNewProgramNotification'
        ],
        'App\Events\CourseCreated' => [
            'App\Listeners\OfficeActivity\Courses\AnnouncePublication'
        ],
        'App\Events\ReplyCreated' => [
            'App\Listeners\Courses\Discussion\NotifyUser'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
