<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use App\Billing\{Purchase, Membership};
use App\Traits\{RecordsLogin, Subscriptions, Billable, HasFavorites, HasRoutine, Filterable, CompletesCourses, SubmitsFeedbacks};
use Illuminate\Support\Facades\Mail;
use App\Events\UserRemoved;
use App\Records\Stats;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, RecordsLogin, Subscriptions, Billable, HasFavorites, HasRoutine, Filterable, CompletesCourses, SubmitsFeedbacks;

    protected $guarded = [];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['last_login_at', 'trial_ends_at'];
    protected $casts = [
        'confirmed' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function($user) {

            if ($user->routines()->exists()) {
                $user->routines->each(function($routine) {
                    $routine->schedules()->delete();
                });
                $user->routines()->delete();
            }

            if ($user->membership()->exists()) {
                $user->membership->cancelImmediately();
                $user->membership()->delete();
            }

            if ($user->payments()->exists()) {
                $user->payments()->delete();
            }
            
            $user->deleteAvatar();
            $user->notifications()->delete();
            $user->purchases()->delete();
            $user->categories()->detach();
            $user->discussions->each->delete();
            $user->replies()->delete();
            $user->favoriteLessons()->detach();
            $user->favoritePrograms()->detach();
            $user->favoriteAsanas()->detach();
            $user->completedLessons()->detach();
            $user->routineQuestionaires()->delete();
            $user->unsubscribeFromAll();

            event(new UserRemoved($user));

            UserRecord::markDeleted($user->id);
        });
    }

    public function avatar()
    {
        $avatar = ($this->avatar_path) ? $this->avatar_path : 'app/avatars/default/missing.png';
    	return $avatar;
    }

    public function cleanAvatar()
    {
        return str_replace('https://anandamayiyoga.s3.amazonaws.com/', '', $this->avatar());
    }

    public function deleteAvatar()
    {
        $directory = cloudEnv()."/avatars/{$this->id}";

        Storage::disk('s3')->deleteDirectory($directory);
    }

    public function validNotifications()
    {
        $notifications = $this->unreadNotifications->filter(function($notification) {
            return \Storage::disk('s3')->exists($notification->data['image']);
        });

        return $notifications;
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getCardAttribute()
    {
        return "<strong>{$this->membership->card_brand}</strong> ending with {$this->membership->card_last_four}";
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function routineQuestionaires()
    {
        return $this->hasMany(RoutineQuestionaire::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function courses()
    {
        $courses = $this->purchases()->where('product_type', 'App\Course')->pluck('product_id');

        return Course::find($courses);
    }

    public function membership()
    {
        return $this->hasOne(Membership::class);
    }

    public function routines()
    {
        return $this->hasMany(Routine::class);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function completedLessons()
    {
        return $this->belongsToMany(Lesson::class, 'completed_lessons')->withTimestamps();
    }

    public function completedPrograms()
    {
        return $this->belongsToMany(Program::class, 'completed_programs')->withTimestamps();
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function completedLessonsOn($date)
    {
        $records = $this->completedLessons->pluck('pivot.created_at');

        $count = 0;

        for ($i = 0; $i < $records->count(); $i++) {
            if ($records[$i]->isSameDay($date)) {
                $count += 1;
            }
        }

        return $count;
    }

    public function lastTimeCompleted(Lesson $lesson)
    {
        return $this->completedLessons->pluck('pivot')->where('lesson_id', $lesson->id)->last()->created_at;
    }

    public function hasCategory($categoryId)
    {
        return $this->categories->contains('id', $categoryId);
    }

    public function getRecommendations($limit = null)
    {
        return Lesson::recommendedFor($this)->limit($limit)->get();
    }

    public function hasPreferencesSelected()
    {
        $hasLevel = !! $this->level_id;
        $hasCategory = !! $this->categories()->count();

        return $hasLevel && $hasCategory;
    }

    public function pendingRoutine()
    {
        return $this->routineQuestionaires()->whereNull('completed_at')->latest()->first();
    }

    public function sendMail($mail)
    {
        Mail::to($this->email)->send(new $mail($this));
    }

    public function scopeHasCategories($query, $categories)
    {
        dd('test!');
        return $query->whereHas('categories', function($query) use ($categories) {
            $query->whereIn('id', $categories);
        });
    }

    public function records($days = 5)
    {
        $now = Carbon::now();

        $records = [
            $this->completedLessonsOn($now)
        ];

        for ($i = 1; $i <= $days; $i++) {
            array_unshift(
                $records, 
                $this->completedLessonsOn($now->subDays($i))
            ); 
        }

        return json_encode($records);
    }

    public function scopeCreatedOn($query)
    {
        return $query->whereRaw('day(created_at) day, count(*)')->groupBy('day');
    }

    public function scopeStatistics($query)
    {
        return new Stats($this);
    }

    public function confirm()
    {
        $this->update([
            'confirmed' => true,
            'trial_ends_at' => Carbon::now()->addDays(config('membership.trial_duration'))
        ]);

        return $this;
    }
}
