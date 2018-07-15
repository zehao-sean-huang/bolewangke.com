<?php

namespace App;

use App\Traits\HasPrice;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Course extends Model
{
    use HasPrice;
    use HasTags;

    protected $table = "courses";

    public function teachers() {
        return $this->belongsToMany('App\Teacher', 'teacher_course');
    }

    public function videos() {
        return $this->belongsToMany('App\Video', 'course_video');
    }
}
