<?php

namespace App;

use App\Traits\HasPrice;
use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasPrice;
    use HasTags;

    protected $table = "notes";

    public function getExampleImagesAttribute() {
        return json_decode($this->images);
    }
}
