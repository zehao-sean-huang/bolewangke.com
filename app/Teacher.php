<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $guarded = [];

    protected $hidden = [];

    public function subjects() {
        return $this->belongsToMany('App\Subject', 'teacher_subject');
    }

    public function videos() {
        return $this->belongsToMany('App\Video', 'teacher_video');
    }

    public function courses() {
        return $this->belongsToMany('App\Course', 'teacher_course');
    }
}
