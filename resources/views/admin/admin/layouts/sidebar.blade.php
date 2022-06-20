<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/superadmin')}}" class="brand-link">
      <img src="{{url('images/logo.png')}}" alt="AllPNGFree Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AllPNGFree</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{url('/superadmin')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/post/add')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Add Post
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/post')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manage Posts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/superadmin/category')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Manage Category
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
