<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'qq', 'mobile', 'address', 'real_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function subscribedVideos() {
        return $this->morphedByMany('App\Video', 'subscription')
            ->wherePivot('paid', true)
            ->withPivot('id');
    }

    public function orderedVideos() {
        return $this->morphedByMany('App\Video', 'subscription')
            ->wherePivot('paid', false)
            ->withPivot('id');
    }

    public function subscribedCourses() {
        return $this->morphedByMany('App\Course', 'subscription')
            ->wherePivot('paid', true)
            ->withPivot('id');
    }

    public function orderedCourses() {
        return $this->morphedByMany('App\Course', 'subscription')
            ->wherePivot('paid', false)
            ->withPivot('id');
    }

}
