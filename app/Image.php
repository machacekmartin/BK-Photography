<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class Image extends Model
{
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
