<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
  protected $fillable = [
   'user_name',
   'activity_message'
  ];
}
