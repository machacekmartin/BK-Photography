<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Category;

class Album extends Model
{

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
