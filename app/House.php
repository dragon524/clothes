<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'title',    'price',        'building',  'area','galleryimage', 'bedroom', 'bathroom',
        'slug',    'capacity',        'area',     'description',  
    
        
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
        return $this->hasMany(HouseImageGallery::class);
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
