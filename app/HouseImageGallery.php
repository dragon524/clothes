<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HouseImageGallery extends Model
{
    protected $fillable = ['house_id', 'name', 'size'];

    public function house()
    {
        return $this->belongsTo('App\house');
    }
}


