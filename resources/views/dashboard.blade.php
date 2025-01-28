@extends('layouts.app')


@section('content')
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      @if(auth()->user()->can('generate.report'))
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
              class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      @endif
  </div>

  <!-- Content Row -->
  <div class="row">

   @if(auth()->user()->can('total.user.view'))
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-md-4 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fa-solid fa-users-line fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    @endif


    @if(auth()->user()->can('stock.view'))
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-md-4 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Stock</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($totalSum)}}</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
     @endif

     @if(auth()->user()->can('earning.view'))
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-md-4 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Earining
                          </div>
                          <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">${{number_format($totalEearning)}}</div>
                              </div>
                          </div>
                      </div><div class="col-auto">
                       <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                   </div>
                  </div>
              </div>
          </div>
      </div>
     @endif
  </div>

  <!-- Content Row -->
  @if(auth()->user()->can('graph.view'))
  <div class="row">

      <!-- Area Chart -->
      <div class="col-md">
          <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div
                  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sales Overview</h6>
                  <div class="dropdown no-arrow">
                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                          aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </div>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                  <div class="chart-area">
                      <canvas id="myAreaChart"></canvas>
                  </div>
              </div>
          </div>
      </div>

  </div>
  @endif

@endsection

@section('scripts')
    <script>
     const earningsData = @json($data); // Convert PHP array to JavaScript array

    </script>
    
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
@endsection