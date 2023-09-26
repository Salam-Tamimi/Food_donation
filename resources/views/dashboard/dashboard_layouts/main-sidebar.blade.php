<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/')}}" class="brand-link" style="margin-top: 8px" height="200px" width="">
    <img src="{{ asset('assets/img/logo.png') }}" href="{{url('/')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity:.8"  >
    <span class="brand-text font-weight-bolder font-size-300px">FoodSHare</span>
    <div class="info">
      <h5 style=" color:#53A798; display: inline-block; margin-right: 10px;margin-top:20px;margin-left:10px">Welcome back,  {{ session('name') }}</h5>
  </div>
  </a>
  
  
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    

    <!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="{{url('main/dashboard')}}" class="nav-link">
        <i class="fas fa-home nav-icon"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/users')}}" class="nav-link">
        <i class="fas fa-users nav-icon"></i>
        <p>Users</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/admins')}}" class="nav-link">
        <i class="fas fa-user-shield nav-icon"></i>
        <p>Admins</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/categories')}}" class="nav-link">
        <i class="fas fa-th nav-icon"></i>
        <p>Categories</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/donations')}}" class="nav-link">
        <i class="fas fa-hand-holding-heart nav-icon"></i>
        <p>Donations</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/user-donations')}}" class="nav-link">
        <i class="fas fa-hand-holding-usd nav-icon"></i>
        <p>User Donations</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/partners')}}" class="nav-link">
        <i class="fas fa-handshake nav-icon"></i>
        <p>Partners</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/volanteers')}}" class="nav-link">
        <i class="fas fa-hands-helping nav-icon"></i>
        <p>Volunteers</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url('dashboard/jobs')}}" class="nav-link">
        <i class="fas fa-briefcase nav-icon"></i>
        <p>Jobs</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="fas fa-envelope nav-icon"></i>
        <p>
          Mailbox
          <i class="fas fa-angle-down right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{url('send-email')}}" class="nav-link">
            <i class="far fa-envelope nav-icon"></i>
            <p>Send</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
  <div class="container">
    <a href="{{url('dashboard_logout')}}" class="btn btn-danger" style="margin-top: 15px;margin-left: 10px">Logout</a>
  </div>
</nav>
<!-- /.sidebar-menu -->

  </div>
  <!-- /.sidebar -->
</aside>
