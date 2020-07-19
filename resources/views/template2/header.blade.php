<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ADMIN PERUM</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">

                  </li>
                </ul>
              </li>
              <li class="footer"></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
            <ul class="dropdown-menu">
              
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                
                </ul>
              </li>
              
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                </ul>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{url('adminlte/dist/img/listing-5.jpg')}}" class="user-image" alt="">
              <span class="hidden-xs">{{Auth::user()->nama}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('adminlte/dist/img/listing-5.jpg')}}" class="img-circle" alt="">

                <p>
                  {{Auth::user()->nama}}
                  <small>Admin Perumahan</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{route('admin-perum.logout')}}" class="btn btn-primary" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Logout</a>
                </div>
              </li>
            </ul>
          </li>
  </header>

