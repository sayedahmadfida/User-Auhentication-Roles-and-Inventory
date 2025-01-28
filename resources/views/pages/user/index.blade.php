@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <!-- Logout Modal-->
    @if (auth()->user()->can('user.create'))
        @include('pages.user.create')
    @endif
    <div class="row">
        <div class="col-md mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between py-2 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">User's</h6>
                    @if (auth()->user()->can('user.create'))
                        <a href="#" data-toggle="modal" data-target="#createUserModal"
                            class="m-0 font-weight-bold text-white">+ New
                            User</a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    @if (auth()->user()->can('user.status') ||
                                            auth()->user()->can('user.set.permission') ||
                                            auth()->user()->can('user.remove.permission'))
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span
                                                class=" btn-sm {{ $user->user_status == 'Active' ? 'bg-gradient-success' : 'bg-gradient-danger' }}  text-white disabled">{{ $user->user_status }}</span>
                                        </td>
                                        @if (auth()->user()->can('user.status') ||
                                                auth()->user()->can('user.set.permission') ||
                                                auth()->user()->can('user.remove.permission'))
                                            <td class="d-flex justify-content-around">
                                                @if (auth()->user()->can('user.status'))
                                                    <a href="#" onclick="changeStatus(event)"
                                                        data-id={{ $user->id }}>
                                                        @if ($user->user_status != 'Active')
                                                            <i class="fa-regular fa-square-check text-success"></i>
                                                        @else
                                                            <i class="fa-solid fa-user-slash text-danger"></i>
                                                        @endif
                                                    </a>
                                                @endif
                                                @if (auth()->user()->can('user.set.permission'))
                                                    <a href="{{ route('user-role', $user->id) }}">
                                                        <i class="fa-solid fa-gear text-primary"></i>
                                                    </a>
                                                @endif
                                                @if (auth()->user()->can('user.remove.permission'))
                                                    <a href="{{ route('remove-user-role', $user->id) }}">
                                                        <i class="fa-regular fa-square-minus text-danger"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/js/user.js') }}"></script>
@endsection
