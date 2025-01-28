@extends('layouts.app')
@section('title', 'Sales')
@section('content')

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
                        <table class="table table-bordered" id="activity-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Activity</th>
                                    <th>Date</th>
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
        let data = null;
        $(document).ready(function() {
            data = $("#activity-table").DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('activity-log.index') }}",
                columns: [{
                        data: "id",
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "user_name",
                        name: "user_name",
                    },
                    {
                        data: "activity_message",
                        name: "activity_message",
                    },
                    {
                        data: "created_at",
                        name: "created_at",
                    },
                ],
            });
        });
    </script>
@endsection
