<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = ['name', 'introduction', 'file_id', 'thumbnail'];

    protected $visible = ['name', 'introduction', 'file_id', 'thumbnail'];

    public function teachers() {
        return $this->belongsToMany('App\Teacher', 'teacher_video');
    }

    public function subscribingUsers() {
        return $this->morphToMany('App\User', 'subscription');
    }
}
