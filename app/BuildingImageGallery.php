<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingImageGallery extends Model
{
    protected $fillable = ['building_id', 'name', 'size'];

    public function building()
    {
        return $this->belongsTo('App\building');
    }
}


