<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSchedule extends Model
{
    //
  protected $fillable = [
    'user_id', 'department', 'position', 'shift_schedule',
  ];
}
