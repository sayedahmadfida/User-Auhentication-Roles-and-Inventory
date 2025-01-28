<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
 /**
  * Display a listing of the resource.
  */

 public function index()
 {
  return view('pages.product.index');
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

  if (auth()->user()->can('sale.create')) {
   $data = $request->toArray();
   $data['user_id'] = auth()->user()->id;
   $data['total'] = $request->price * $request->quantity;
   Product::create($data);
   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Sold product :' . $request->product_name
   ]);
  }
  return response()->json(['success' => 'Product Successfully Purchased!']);
 }

 /**
  * Display the specified resource.
  */

 public function show(Product $product)
 {
  return $product;
 }

 /**
  * Show the form for editing the specified resource.
  */

 public function edit(Product $product)
 {
  //
 }

 /**
  * Update the specified resource in storage.
  */

 public function update(ProductRequest $request, Product $product)
 {
  if (auth()->user()->can('product.edit')) {
   $data = $request->toArray();
   $data['total'] = $request->price * $request->quantity;

   $product->update($data);
   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Updated product :' . $request->product_name
   ]);
  }
  return response()->json(['success' => 'Product Successfully Udated!']);
 }

 /**
  * Remove the specified resource from storage.
  */

 public function destroy(Product $product)
 {
  if (auth()->user()->can('product.delete')) {
   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Deleted product :' . $product->product_name
   ]);
   $product->delete();
  }
  return response()->json(['success' => 'Purchased Product Successfully Deleted!']);
 }

 public static function changeStatus(Request $request)
 {
  if (auth()->user()->can('product.status')) {
   $product = Product::findOrFail($request->id);
   $productStatus = $product->product_status == 'Active' ? 'Disabled' : 'Active';
   $product->product_status = $productStatus;
   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Changed product Status to :' . $productStatus
   ]);
   return $product->save();
  }
  return false;
 }


 public function getData(Request $request)
 {
  if ($request->ajax()) {
   $data = Product::orderBy('id', 'ASC')->get();
   return DataTables::of($data)

    ->addColumn('action', function ($row) {
     $editButton = '';
     $deleteButton = '';

     if (auth()->user()->can('product.edit')) {
      $editButton = '<a class="dropdown-item edit-btn" data-id="' . $row->id . '" href="#">Edit</a>';
     }
     if (auth()->user()->can('product.delete')) {
      $deleteButton = '<button class="dropdown-item"    onclick="deleteProduct()" data-id="' . $row->id . '">Delete</button>';
     }

     return '<div class="dropdown">
      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Action
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       ' .

      $editButton . $deleteButton
      . '<button class="dropdown-item"    onclick="changeStatus()" data-id="' . $row->id . '">Change Status</button>
              <a class="dropdown-item show-btn" data-id="' . $row->id . '" href="#">Show Details</a>
          </div>
      </div>';
    })
    ->make(true);
  }
 }

 public static function editProduct($id)
 {

  $products = Product::findOrFail($id);
  return $products;
 }
}
