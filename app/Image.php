<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class Image extends Model
{

    protected $guarded = [];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
