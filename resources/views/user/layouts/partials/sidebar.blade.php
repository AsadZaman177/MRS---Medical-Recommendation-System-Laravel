<aside class="main-sidebar sidebar-dark-primary elevation-4">
    

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/user-avator.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('user/profile') }}" class="nav-link {{ (request()->is('user/profile')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Update Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('user/orders') }}" class="nav-link {{ (request()->is('user/orders/*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('user/orders/processing') }}" class="nav-link {{ (request()->is('user/orders/processing')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>Processing Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('user/orders/delivered') }}" class="nav-link {{ (request()->is('user/orders/delivered')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Deliever Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('user/orders/onhold') }}" class="nav-link {{ (request()->is('user/orders/onhold')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pause"></i>
                        <p>OnHold Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('user/orders/completed') }}" class="nav-link {{ (request()->is('user/orders/completed')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-check-circle"></i>
                        <p>Completed Orders</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>