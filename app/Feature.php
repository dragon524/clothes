<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name','slug'];

    
    public function properties()
    {
        return $this->belongsToMany(Property::class)->withTimestamps();
    }

    public function buildings()
    {
        return $this->belongsToMany(Building::class)->withTimestamps();
    }
    public function houses()
    {
        return $this->belongsToMany(Building::class)->withTimestamps();
    }
}
