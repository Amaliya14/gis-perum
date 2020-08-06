<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('adminlte/dist/img/admin.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->nama}}</p>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="@if(Request::is('admin/dashboard')) active @endif">
          <a href="{{url('admin/dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="@if(Request::is('admin/kecamatan')) active @endif">
          <a href="{{url('admin/kecamatan')}}">
            <i class="fa fa-pie-chart"></i>
            <span>Data Kecamatan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="@if(Request::is('admin/kelurahan')) active @endif">
          <a href="{{url('admin/kelurahan')}}">
            <i class="fa fa-pie-chart"></i>
            <span>Data Kelurahan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="@if(Request::is('admin/perumahan') || Request::is('admin/perumahan/*') ) active @endif">
          <a href="{{url('admin/perumahan')}}">
            <i class="fa fa-book"></i>
            <span>Data Perumahan</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class="@if(Request::is('admin/pengembang') || Request::is('admin/pengembang/*')) active @endif">
          <a href="{{url('admin/pengembang')}}">
            <i class="fa fa-edit"></i>
            <span>Data Pengembang</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="fa fa-circle-o text-red"></i>
            <span >Logout</span>
            <span class="pull-right-container"></span>
          </a>

          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
