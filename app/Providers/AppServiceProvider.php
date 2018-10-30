<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\{Lesson, Level, Category, Schedule, AsanaType, AsanaSubType, RoutineQuestionaire, WallpaperCategory, Article, ArticleTopic, Teacher};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view) {
            $view->with([
                'membershipPlan' => (object)config('membership'),
                'asanaTypes' => AsanaType::orderBy('order')->get(),
                'asanaSubtypes' => AsanaSubType::orderBy('order')->get(),
                'categories' => Category::with('lessons')->orderBy('order')->get(),
                'levels' => Level::all(),
                'nextFourDays' => Schedule::nextFourDays()
            ]);
        });

        \View::composer('pages/reads/blog/sidebar', function($view) {
            $topics = ArticleTopic::has('articles')->orderBy('name')->get();

            $view->with([
                'topics' => $topics
            ]);
        });

        \View::composer('layouts/app', function($view) {
            $notifications = auth()->check() ? auth()->user()->validNotifications() : [];

            $view->with('notifications', $notifications);
        });

        \View::composer('admin/layouts/app', function($view) {
            $notifications = auth()->user()->unreadNotifications;
            $numberOfNewRequests = RoutineQuestionaire::new()->count();
            $wallpaperCategories = WallpaperCategory::all();

            $view->with([
                'numberOfNewRequests' => $numberOfNewRequests,
                'notifications' => $notifications,
                'wallpaperCategories' => $wallpaperCategories
            ]);
        });

        \View::composer('components/swiper/trending', function($view) {
            $view->with('trending', Lesson::trending(10));
        });

        \View::composer('components/swiper/latest', function($view) {
            $view->with('latest', Lesson::recent(10));
        });

        \View::composer('components/swiper/free', function($view) {
            $view->with('freeClasses', Lesson::free(10));
        });

        \View::composer('pages/user/dashboard/sections/recommended', function($view) {
            $view->with('recommendations', auth()->user()->getRecommendations());
        });

        \View::composer('pages/user/dashboard/sections/favorite-asanas', function($view) {
            $view->with('favoriteAsanas', auth()->user()->favoriteAsanas);
        });

        \View::composer('pages/user/dashboard/sections/favorite-classes', function($view) {
            $view->with('favoriteLessons', auth()->user()->favoriteLessons);
        });

        \View::composer('pages/user/dashboard/sections/favorite-programs', function($view) {
            $view->with('favoritePrograms', auth()->user()->favoritePrograms);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
