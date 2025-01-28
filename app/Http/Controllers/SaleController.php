<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
 /**
  * Display a listing of the resource.
  */

 public function index()
 {
  $products = Product::with('sales')
   ->select('id', 'product_name', 'quantity')
   ->get()
   ->map(function ($product) {

    $totalSalesQuantity = $product->sales->sum('quantity');


    $remainingQuantity = $product->quantity - $totalSalesQuantity;

    return [
     'id' => $product->id,
     'product_name' => $product->product_name,
     'remaining_quantity' => $remainingQuantity,
    ];
   });
  return view('pages.sales.index', compact('products'));
 }

 /**
  * Show the form for creating a new resource.
  */

 public function create()
 {
  //
 }

 /**
  * Store a newly created resource in storage.
  */

 public function store(Request $request)
 {
  $request->validate([
   'product_id' => 'required|exists:products,id',
   'quantity' => 'required|integer|min:1',
   'price' => 'required|numeric|min:0',
  ]);

  if (auth()->user()->can('product.create')) {
   $product = Product::findOrFail($request->product_id);
   $profit = ($request->price - $product->price) * $request->quantity;
   Sale::create([
    'user_id' => auth()->user()->id,
    'product_id' => $request->product_id,
    'quantity' => $request->quantity,
    'price' => $request->price,
    'total' => $request->price * $request->quantity,
    'profit' => $profit,
   ]);
   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Create new product :' . $product->product_name
   ]);
  }
  return response()->json(['success' => 'Product Successfully Sold!']);
 }

 /**
  * Display the specified resource.
  */

 public function show(Sale $sale)
 {
  //
 }

 /**
  * Show the form for editing the specified resource.
  */

 public function edit(Sale $sale)
 {
  //
 }

 /**
  * Update the specified resource in storage.
  */

 public function update(Request $request, Sale $sale)
 {
  //
 }

 /**
  * Remove the specified resource from storage.
  */

 public function destroy(Sale $sale)
 {
  if (auth()->user()->can('sale.delete')) {

   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Deleted product :' . $sale->product->product_name
   ]);

   $sale->delete();
  }
  return response()->json(['success' => 'Purchased Product Successfully Deleted!']);
 }


 public static function getData()
 {
  $sale = Sale::all();
  return DataTables::of($sale)

   ->editColumn('created_at', function ($row) {
    return substr($row->created_at, 0, 10);
   })
   ->addColumn('product_name', function ($row) {
    return $row->product->product_name;
   })
   ->addColumn('action', function ($row) {
    return auth()->user()->can('sale.delete') ? '<button class="btn btn-danger btn-sm"    onclick="deleteProduct()" data-id="' . $row->id . '">Delete</button>' : null;
   })
   ->make(true);
 }
}
