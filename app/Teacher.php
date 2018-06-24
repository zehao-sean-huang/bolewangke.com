<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $guarded = [];

    protected $hidden = [];

    public function getGaokaoAttribute($value) {
        return json_decode($value);
    }

    public function subjects() {
        return $this->belongsToMany('App\Subject', 'teacher_subject');
    }

    public function videos() {
        return $this->belongsToMany('App\Video', 'teacher_video');
    }
}
