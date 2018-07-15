<?php

namespace App\Traits;

trait HasTags {
    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
