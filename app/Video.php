<?php

namespace App;

use App\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasPrice;

    protected $table = 'videos';

    protected $fillable = ['name', 'introduction', 'file_id', 'thumbnail'];

    protected $visible = ['name', 'introduction', 'file_id', 'thumbnail'];

    public function teachers() {
        return $this->belongsToMany('App\Teacher', 'teacher_video');
    }

    public function courses() {
        return $this->belongsToMany('App\Course', 'course_video');
    }

    public function getPublishedAttribute() {
        return $this->file_id !== 0;
    }

    public function subscribingUsers() {
        return $this->morphToMany('App\User', 'subscription');
    }
}
