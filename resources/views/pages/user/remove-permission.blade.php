@extends('layouts.app')


@section('title', 'Remove User Roles')
@section('content')
    <div class="card">
        <div class="card-header bg-primary py-2 text-white">Remove Permission from {{$user->name}}</div>
        <div class="card-body">
            <form action="{{route('remove-permission')}}" method="POST">
             @csrf
             <input type="hidden" name="user_id" value="{{$user->id}}">
                <div><h3>Dashboard</h3>
                 <div class="d-flex justify-content-between">
                     <div>
                         <label for="total-user-view">Total User</label>
                         <input type="checkbox" name="permissions[]" value="total.user.view" id="total-user-view">
                     </div>
                     <div>
                         <label for="stock">Stock</label>
                         <input type="checkbox" name="permissions[]" value="stock.view" id="stock">
                     </div>
                     <div>
                         <label for="earning">Earning</label>
                         <input type="checkbox" name="permissions[]" value="earning.view" id="earning">
                     </div>
                     <div>
                         <label for="graph">Graph</label>
                         <input type="checkbox" name="permissions[]" value="graph.view" id="graph">
                     </div>
                     <div>
                         <label for="report">Report</label>
                         <input type="checkbox" name="permissions[]" value="generate.report" id="report">
                     </div>
                     <div>
                         <label for="activity">Activity</label>
                         <input type="checkbox" name="permissions[]" value="activity.view" id="activity">
                     </div>
                 </div>
                 <hr>
                    <h3>User</h3>
                    <div class="d-flex justify-content-between">
                        <div>
                            <label for="user-create">Create</label>
                            <input type="checkbox" name="permissions[]" value="user.create" id="user-create">
                        </div>
                        <div>
                            <label for="user-edit">Edit</label>
                            <input type="checkbox" name="permissions[]" value="user.edit" id="user-edit">
                        </div>
                        <div>
                            <label for="user-delete">Delete</label>
                            <input type="checkbox" name="permissions[]" value="user.delete" id="user-delete">
                        </div>
                        <div>
                            <label for="user-view">View</label>
                            <input type="checkbox" name="permissions[]" value="user.view" id="user-view">
                        </div>
                        
                        <div>
                         <label for="set-permission">Set Permission</label>
                         <input type="checkbox" name="permissions[]" value="user.set.permission" id="set-permission">
                     </div>
                     <div>
                         <label for="remove-permission">Remove Permission</label>
                         <input type="checkbox" name="permissions[]" value="user.remove.permission" id="remove-permission">
                     </div>
                     <div>
                         <label for="user-status">User Status</label>
                         <input type="checkbox" name="permissions[]" value="user.status" id="user-status">
                     </div>
                    </div>
                    <hr>
                    <h3>Product</h3>
                    <div class="d-flex justify-content-between">
                        <div>
                            <label for="product-create">Create</label>
                            <input type="checkbox" name="permissions[]" value="product.create" id="product-create">
                        </div>
                        <div>
                            <label for="product-edit">Edit</label>
                            <input type="checkbox" name="permissions[]" value="product.edit" id="product-edit">
                        </div>
                        <div>
                            <label for="product-delete">Delete</label>
                            <input type="checkbox" name="permissions[]" value="product.delete" id="product-delete">
                        </div>
                        <div>
                            <label for="product-view">View</label>
                            <input type="checkbox" name="permissions[]" value="product.view" id="product-view">
                        </div>
                    </div>
                    <hr>
                    <h3>Sale</h3>
                    <div class="d-flex justify-content-between">
                        <div>
                            <label for="sale-create">Create</label>
                            <input type="checkbox" name="permissions[]" value="sale.create" id="sale-create">
                        </div>
                        <div>
                            <label for="sale-edit">Edit</label>
                            <input type="checkbox" name="permissions[]" value="sale.edit" id="sale-edit">
                        </div>
                        <div>
                            <label for="sale-delete">Delete</label>
                            <input type="checkbox" name="permissions[]" value="sale.delete" id="sale-delete">
                        </div>
                        <div>
                            <label for="sale-view">View</label>
                            <input type="checkbox" name="permissions[]" value="sale.view" id="sale-view">
                        </div>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
