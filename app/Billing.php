<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = ['user_id','house_id','pay_amount', 'pay_date'];
    public $timestamps = false;
}
