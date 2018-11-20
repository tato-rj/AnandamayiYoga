<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('filter', function ($filter, $value) {
            return (request($filter) == $value);
        });

        Blade::if('inArray', function ($array, $value) {
            return ! is_null($array) && in_array($value, $array);
        });

        Blade::if('match', function ($record, $value) {
            return ($record == $value);
        });

        Blade::if('exists', function ($records, $value) {
            return ($records->contains($value));
        });

        Blade::if('old', function ($filter, $value) {
            return (old($filter) == $value);
        });

        Blade::if('oldArray', function ($filter, $value) {
            return is_array(old($filter)) && in_array($value, old($filter));
        });
        
        Blade::if('firstLogin', function () {
            return is_null(auth()->user()->last_login_at);
        });

        Blade::if('confirmed', function ($user) {
            return !! $user->confirmed;
        });

        Blade::if('active', function ($user) {
            return $user->isActive();
        });

        Blade::if('notActive', function ($user) {
            return ! $user->isActive();
        });

        Blade::if('trial', function ($user) {
            return $user->isOnTrial();
        });

        Blade::include('components.sections.title');

        Blade::include('admin.components.draggable.layout', 'draggable');

        Blade::include('components.form.error');

        Blade::include('components.form.input');

        Blade::include('components.form.textarea');

        Blade::include('components.form.trix');

        Blade::include('components.form.edit.input', 'editInput');

        Blade::include('components.form.edit.textarea', 'editTextarea');

        Blade::include('components.form.edit.trix', 'editTrix');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
