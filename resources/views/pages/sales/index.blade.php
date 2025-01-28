@extends('layouts.app')
@section('title', 'Sales')
@section('content')
    <!-- Logout Modal-->
    @if (auth()->user()->can('sale.create'))
        @include('pages.sales.create')
    @endif
    <div class="row">
        <div class="col-md mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between py-2 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Sale's</h6>
                    @if (auth()->user()->can('sale.create'))
                        <a href="#" data-toggle="modal" data-target="#sale-product"
                            class="m-0 font-weight-bold text-white">+ Sale</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="sale-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Profit</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('scripts')
    <script>
        var purchaseDataUrl = "{{ route('sale.data') }}";
    </script>
    <script src="{{ asset('admin/js/sales.js') }}"></script>
@endsection
