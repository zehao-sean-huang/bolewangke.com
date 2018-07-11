<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Subscription extends MorphPivot
{
    protected $table = "subscriptions";

    public function user() {
        return $this->belongsTo('App\User');
    }
}
