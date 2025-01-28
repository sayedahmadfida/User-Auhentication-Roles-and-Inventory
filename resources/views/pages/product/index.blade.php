@extends('layouts.app')

@section('title', 'Products')
@section('content')
    @if (auth()->user()->can('product.create'))
        @include('pages.product.create')
    @endif
    @include('pages.product.edit')
    @include('pages.product.show')
    <div class="row">
        <div class="col-md mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="bg-primary py-2 card-header d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Product's</h6>
                    @if (auth()->user()->can('product.create'))
                        <a href="#" data-toggle="modal" data-target="#create-product-modal"
                            class="m-0 font-weight-bold text-white">+ New Product</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="products-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('scripts')

    <script>
        var purchaseDataUrl = "{{ route('product.data') }}";
    </script>
    <script src="{{ asset('admin/js/product.js') }}"></script>
@endsection
