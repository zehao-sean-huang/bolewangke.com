<?php

namespace App\Traits;

trait HasPrice {

    public function getOriginalPriceAttribute() {
        return json_decode($this->price)->original;
    }

    public function getCurrentPriceAttribute() {
        return json_decode($this->price)->current;
    }
}