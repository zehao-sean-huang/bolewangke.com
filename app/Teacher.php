<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = ['name', 'introduction'];

    protected $visible = ['name', 'introduction'];

    public function subjects() {
        return $this->belongsToMany('App\Subject', 'teacher_subject');
    }
}
