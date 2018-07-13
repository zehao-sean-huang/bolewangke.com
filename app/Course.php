<?php

namespace App;

use App\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Course extends Model
{
    use HasPrice;

    protected $table = "courses";

    public function teachers() {
        return $this->belongsToMany('App\Teacher', 'teacher_course');
    }

    public function videos() {
        return $this->belongsToMany('App\Video', 'course_video');
    }
}
