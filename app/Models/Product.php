<?php

namespace App\Models;

use App\Models\Sale;
use App\Models\User;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = [
        'product_name',
        'product_status',
        'storage',
        'color',
        'battery',
        'price',
        'quantity',
        'total',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo( User::class );
    }
    public function sales() {
        return $this->hasMany( Sale::class );
    }

}
