<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;

class Image extends Model
{
    protected $fillable = ['name', 'album_id'];

    public function album(){
        return $this->belongsTo(Album::class);
    }
}
