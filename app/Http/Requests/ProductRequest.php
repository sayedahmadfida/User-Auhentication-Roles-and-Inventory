<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
 /**
  * Determine if the user is authorized to make this request.
  */
 public function authorize(): bool
 {
  return true;
 }

 /**
  * Get the validation rules that apply to the request.
  *
  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
  */
 public function rules(): array
 {
  return [
   'product_name' => 'required|string|max:255',
   'storage' => 'required|string|max:255',
   'color' => 'required|string|max:50',
   'battery' => 'required|string|max:100',
   'quantity' => 'required|integer|min:1',
   'price' => 'required|numeric|min:0',
   'product_status' => 'required|string|max:255',
  ];
 }
}
