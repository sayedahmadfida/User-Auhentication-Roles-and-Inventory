<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ActivityLogController extends Controller
{
 /**
  * Display a listing of the resource.
  */
 public function index()
 {

  if (request()->ajax()) {
   $activityLog = ActivityLog::orderBy('created_at', 'DESC')->get();
   return DataTables::of($activityLog)

    ->editColumn('created_at', function ($row) {
     return substr($row->created_at, 0, 20);
    })
    ->make(true);
  }
  return view('pages.activity.index');
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
  //
 }

 /**
  * Display the specified resource.
  */
 public function show(ActivityLog $activityLog)
 {
  //
 }

 /**
  * Show the form for editing the specified resource.
  */
 public function edit(ActivityLog $activityLog)
 {
  //
 }

 /**
  * Update the specified resource in storage.
  */
 public function update(Request $request, ActivityLog $activityLog)
 {
  //
 }

 /**
  * Remove the specified resource from storage.
  */
 public function destroy(ActivityLog $activityLog)
 {
  //
 }
}
