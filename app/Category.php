<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function albums(){
        return $this->hasMany('App\Album');
    }
}
