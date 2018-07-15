<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    public function videos() {
        return $this->morphedByMany('App\Video', 'taggable');
    }

    public function courses() {
        return $this->morphedByMany('App\Course', 'taggable');
    }

    public function teachers() {
        return $this->morphedByMany('App\Teacher', 'taggable');
    }

    public function notes() {
        return $this->morphedByMany('App\Note', 'taggable');
    }

    public function getItemsCountAttribute() {
        return count($this->videos) + count($this->courses) + count($this->notes);
    }
}

