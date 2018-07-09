<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";

    public function teachers() {
        return $this->belongsToMany('App\Teacher', 'teacher_course');
    }

    public function videos() {
        return $this->belongsToMany('App\Video', 'course_video');
    }

    public function getOriginalPriceAttribute() {
        return json_decode($this->price)->original;
    }

    public function getCurrentPriceAttribute() {
        return json_decode($this->price)->current;
    }
}
