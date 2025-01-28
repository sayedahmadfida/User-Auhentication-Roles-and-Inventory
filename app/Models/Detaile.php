<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detaile extends Model
{
  protected $fillable = [
   'storage',
   'color',
   'battery',
   'price',
   'quantiry',
   'total',
   'product_id',
   'user_id',
  ];
}
