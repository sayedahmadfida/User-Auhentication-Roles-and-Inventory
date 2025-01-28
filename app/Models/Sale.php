<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
  protected $fillable = [
   
   'user_id',
   'product_id',
   'quantity',
   'price',
   'total',
   'profit',
  ];


  public function product(){
   return $this->belongsTo(Product::class);
  }
  public function user(){
   return $this->belongsTo(User::class);
  }
}
