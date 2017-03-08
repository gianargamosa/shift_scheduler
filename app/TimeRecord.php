<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeRecord extends Model
{
    //
  protected $fillable = [
    'time_in', 'user_id', 'time_out', 'remarks',
  ];

}
