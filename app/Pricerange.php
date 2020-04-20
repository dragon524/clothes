<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricerange extends Model
{
    protected $fillable = ['name','icon','min','max','description'];
}
