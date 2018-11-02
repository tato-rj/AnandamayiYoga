<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function validNotifications()
    {
        $notifications = $this->unreadNotifications->filter(function($notification) {
            return \Storage::disk('s3')->exists($notification->data['image']);
        });

        return $notifications;
    }
}
