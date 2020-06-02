<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class Category extends Model
{

    protected $guarded = [];

    public function albums(){
        return $this->hasMany(Album::class);
    }
}
