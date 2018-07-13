<?php

namespace App;

use App\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    use HasPrice;

    protected $table = "notes";

    public function getExampleImagesAttribute() {
        return json_decode($this->images);
    }
}
