<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = ['name'];

    protected $visible = ['name'];

    public function teachers() {
        return $this->belongsToMany('App\Teacher');
    }
}
