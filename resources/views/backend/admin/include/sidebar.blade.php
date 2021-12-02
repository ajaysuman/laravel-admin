  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Testing</span>
    </a>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Analytics
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          {{-- +++++++++++++++ For ORG +++++++++++++++++++++++ --}}
          <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('subadmin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-copy" class="nav-link "></i>
              <p class="{{ request()->is('subadmin') ? 'active' : '' }} {{ request()->is('usersupdate') ? 'active' : '' }}">
                Org
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('subadmin') }}" class="nav-link {{ request()->is('subadmin') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="{{ request()->is('usersupdate') ? 'active' : '' }}">Org</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
