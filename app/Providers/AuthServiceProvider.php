<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Lesson' => 'App\Policies\LessonPolicy',
        'App\Program' => 'App\Policies\ProgramPolicy',
        'App\Course' => 'App\Policies\CoursePolicy',
        'App\Discussion' => 'App\Policies\DiscussionPolicy',
        'App\Reply' => 'App\Policies\ReplyPolicy',
        'App\Teacher' => 'App\Policies\TeacherPolicy',
        'App\Asana' => 'App\Policies\AsanaPolicy',
        'App\Wallpaper' => 'App\Policies\WallpaperPolicy',
        'App\Article' => 'App\Policies\ArticlePolicy',
        'App\RoutineQuestionaire' => 'App\Policies\RoutinePolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
