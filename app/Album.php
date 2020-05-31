<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
