<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
 /**
  * Display a listing of the resource.
  */

 public function index()
 {

  $users = User::where('id', '!=', auth()->user()->id)->where('id', '!=', 1)->get();

  return view('pages.user.index', compact('users'));
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
  if (auth()->user()->can('user.create')) {
   $data = $request->toArray();
   $data['user_id'] = auth()->user()->id;

   $data['user_type'] = 'User';
   $user = User::create($data);

   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Created new user:' . $user->name
   ]);
  }
  return redirect()->back();
 }

 /**
  * Display the specified resource.
  */

 public function show(string $id)
 {

 }

 /**
  * Show the form for editing the specified resource.
  */

 public function edit(string $id)
 {
  //
 }

 /**
  * Update the specified resource in storage.
  */

 public function update(Request $request, string $id)
 {
  //
 }

 /**
  * Remove the specified resource from storage.
  */

 public function destroy(string $id)
 {
  //
 }

 public static function changeStatus(Request $request)
 {
  if (auth()->user()->can('user.status')) {
   $user = User::findOrFail($request->id);
   $userStatus = $user->user_status == 'Active' ? 'Disabled' : 'Active';
   ActivityLog::create([
    'user_name' => auth()->user()->name,
    'activity_message' => 'Change ' . $user->name . ' Status to :' . $userStatus
   ]);
   $user->user_status = $userStatus;
   $user->save();

  }
  return false;
 }

 public static function userRole($id)
 {
  $user = User::findOrFail($id);
  if (auth()->user()->can('user.set.permission')) {
   return view('pages.user.set-permission', compact('user'));
  }
  return redirect()->back();
 }

 public static function setPermission(Request $request)
 {
  if (auth()->user()->can('user.set.permission')) {
   $user = User::findOrFail($request->user_id);
   if ($request->has('permissions')) {
    foreach ($request->permissions as $permission) {
     if (Permission::where('name', $permission)->exists()) {

      $user->givePermissionTo($permission);
     }
    }
   }
  }
  return redirect()->back();
 }

 public static function showRemoveUserRole($id)
 {
  if (auth()->user()->can('user.remove.permission')) {
   $user = User::findOrFail($id);
   return view('pages.user.remove-permission', compact('user'));
  }
  return redirect()->back();
 }

 public static function removePermission(Request $request)
 {
  if (auth()->user()->can('user.remove.permission')) {
   $user = User::findOrFail($request->user_id);
   if ($request->has('permissions')) {
    foreach ($request->permissions as $permission) {
     if ($user->hasPermissionTo($permission)) {
      $user->revokePermissionTo($permission);
     }
    }
   }
  }
  return redirect()->back();
 }
}
