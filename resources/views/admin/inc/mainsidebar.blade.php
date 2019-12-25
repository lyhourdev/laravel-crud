<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('adminlte')}}/index3.html" class="brand-link">
        <img src="{{asset('adminlte')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{url('/user')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p class="text">User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/category')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p class="text">Category</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{url('/item')}}" class="nav-link">
                    <i class="nav-icon far fa-circle text-info"></i>
                    <p class="text">Item</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar -->
</aside>
