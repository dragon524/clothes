<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['agent_id','user_id','house_id','name','email','phone','capacity','start_date','end_date','status'];
}
