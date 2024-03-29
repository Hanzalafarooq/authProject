<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-purple elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        {{-- <a href="{{route('home')}}" class="brand-link"> --}}
        <img src="{{ asset('images/poslg.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>
    <!-- Log on to codeastro.com for more projects -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{-- <img src="{{ auth()->user()->getAvatar() }}" class="img-circle elevation-2" alt="User Image"> --}}
                <img src=""class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                {{-- <a href="#" class="d-block">{{ auth()->user()->getFullname() }}</a> --}}
                <a href="#" class="d-block"></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item has-treeview">
                    {{-- <a href="{{route('admin')}}" class="nav-link"> --}}
                    <a href="{{ url('/redirect') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    {{-- <a href="" class="nav-link "> --}}
                    <a href="{{ route('brand') }}" class="nav-link ">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>Brand</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('color') }}" class="nav-link ">
                        {{-- <a href="{{route('admin.customer.index')}}" class="nav-link "> --}}
                        <i class="nav-icon fas fa-users"></i>
                        <p>Color</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('size') }}" class="nav-link ">
                        {{-- <a href="{{route('admin.cart.index')}}" class="nav-link "> --}}
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Size</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('category') }}" class="nav-link ">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('subcategory') }}" class="nav-link ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Subcategory</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('/product') }}" class="nav-link ">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Add Product</p>
                    </a>
                </li>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('/') }}" class="nav-link ">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Go To Frontend</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link" onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>

                        <form action="" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div><!-- Log on to codeastro.com for more projects -->
    <!-- /.sidebar -->
</aside>
