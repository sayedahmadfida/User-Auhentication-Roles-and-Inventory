<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public static function index(){

   $users = User::count();
   $totalSum = Product::with('sales')
        ->select('id', 'product_name', 'quantity', 'price')
        ->get()
        ->map(function ($product) {
            $remainingQuantity = $product->quantity - $product->sales->sum('quantity');
            return $product->price * max($remainingQuantity, 0);
        })->sum();
   $totalEearning = Sale::sum('profit');


   $data = Sale::select(DB::raw('SUM(total) as total, MONTH(created_at) as month'))
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total')
        ->pad(12, 0) 
        ->toArray(); 

   return view('dashboard', compact('users', 'totalSum', 'totalEearning', 'data'));
  }
}
