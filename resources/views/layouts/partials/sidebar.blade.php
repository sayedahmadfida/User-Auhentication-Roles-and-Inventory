<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    
   @if(auth()->user()->can('user.view'))
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
         <i class="fa-solid fa-users"></i>
            <span>User's</span></a>
    </li>
    @endif
   @if(auth()->user()->can('product.view'))
    <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
         <i class="fa-brands fa-product-hunt"></i>
            <span>Product</span></a>
    </li>
    @endif
    
    
   @if(auth()->user()->can('sale.view'))
    <li class="nav-item">
        <a class="nav-link" href="{{route('sales.index')}}">
         <i class="fa-solid fa-cart-shopping"></i>
            <span>Sale</span></a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">





</ul>
