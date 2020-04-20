<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'title',    'parking_price','featured',  'parking','galleryimage', 'image',
        'slug',    'city',     'city_slug',    'address',
        'area',     'agent_id',     'description',  'video',    'floor_plan',   
        'location_latitude',        'location_longitude',       'nearby',
        
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'agent_id');
    }

    public function gallery()
    {
        return $this->hasMany(BuildingImageGallery::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    //public function rating()
    //{
    //    return $this->hasMany(Rating::class, 'building_id');
    //}

}
