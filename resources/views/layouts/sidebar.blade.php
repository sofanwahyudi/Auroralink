<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> --}}

      <!-- search form (Optional) -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> --}}
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li ><a href="{{url('admin/supplier')}}"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
        <li ><a href="{{url('admin/leads')}}"><i class="fa fa-paper-plane-o"></i> <span>Leads</span></a></li>
        <li class="treeview ">
                <a href="#"><i class="fa fa-cube"></i> <span>Part</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li><a href="{{url('admin/part')}}"><i class="fa fa-cubes"></i> <span>Daftar Part</span></a></li>
                  <li><a href="{{url('admin/part/kategori')}}"><i class="fa fa-filter"></i> <span>Part Kategori</span></a></li>

              </ul>
        </li>
        <li class="treeview ">
                <a href="#"><i class="fa fa-briefcase"></i> <span>Jasa</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li><a href="{{url('admin/jasa')}}"><i class="fa fa-list"></i> <span>Daftar Jasa</span></a></li>
                  <li><a href="{{url('admin/jasa/job')}}"><i class="fa  fa-thumb-tack"></i> <span>Job</span></a></li>
                  <li><a href="{{url('admin/jasa/kategori_servis')}}"><i class="fa  fa-thumb-tack"></i> <span>Kategori Servis</span></a></li>

              </ul>
        </li>
        <li class="treeview ">
            <a href="#"><i class="fa fa-cubes"></i> <span>produk</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu ">
              {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
              <li><a href="{{url('admin/produk')}}"><i class="fa fa-list"></i> <span>Daftar Produk</span></a></li>
              <li><a href="{{url('admin/produk/kategori')}}"><i class="fa  fa-angle-double-right"></i> <span>Kategori</span></a></li>
              {{-- <li><a href="{{url('admin/produk/komentar')}}"><i class="fa  fa-angle-double-right"></i> <span>Komentar</span></a></li> --}}

          </ul>
        </li>
        <li class="treeview ">
            <a href="#"><i class="fa fa-ticket"></i> <span>Ticket</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu ">
              {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
              <li><a href="{{url('admin/jasa')}}"><i class="fa fa-list"></i> <span>Daftar Ticket</span></a></li>
              <li><a href="{{url('admin/jasa/job')}}"><i class="fa fa-flag"></i> <span>Prioritas</span></a></li>
              <li><a href="{{url('admin/jasa/kategori_servis')}}"><i class="fa fa-angle-double-right"></i> <span>Kategori</span></a></li>

          </ul>
        </li>
        <li class="treeview ">
                <a href="#"><i class="fa fa-tasks"></i> <span>Task</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li><a href="{{url('admin/task')}}"><i class="fa fa-list"></i> <span>Daftar Task</span></a></li>
                  <li><a href="{{url('admin/task/project')}}"><i class="fa fa-codepen"></i> <span>Project</span></a></li>
                  <li><a href="{{url('admin/task/servis')}}"><i class="fa fa-medkit"></i> <span>Servis</span></a></li>
                  <li><a href="{{url('admin/task/support')}}"><i class="fa fa-compress"></i> <span>Support</span></a></li>

              </ul>
        </li>
        <li class="treeview ">
                <a href="#"><i class="fa fa-wordpress"></i> <span>Post</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li><a href="{{url('admin/post')}}"><i class="fa fa-list"></i> <span>Daftar Post</span></a></li>
                  <li><a href="{{url('admin/post/kategori')}}"><i class="fa fa-filter"></i> <span>Kategori</span></a></li>

              </ul>
        </li>
        <li class="treeview ">
                <a href="#"><i class="fa  fa-user-md"></i> <span>Team</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li><a href="{{url('admin/team')}}"><i class="fa fa-users"></i> <span>Daftar Team</span></a></li>
                  <li><a href="{{url('admin/team/departemen')}}"><i class="fa fa-user-secret"></i> <span>Departemen</span></a></li>
                  <li><a href="{{url('admin/team/devisi')}}"><i class="fa  fa-user-plus"></i> <span>Devisi</span></a></li>

              </ul>
        </li>
        {{-- <li><a href="#"><i class="fa fa-database"></i> <span>Master</span></a></li> --}}
        @if (Auth::user()->role_id == null)
        <li class="treeview ">
          <a href="#"><i class="fa fa-gears"></i> <span>Setting</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu ">
            {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
            <li><a href="{{url('admin/users')}}"><i class="fa fa-group"></i> <span>Pengguna</span></a></li>
            <li><a href="{{url('admin/roles')}}"><i class="fa fa-unlock-alt"></i> <span>Role</span></a></li>
            <li><a href="{{url('admin/users')}}"><i class="fa fa-check"></i> <span>Permissions</span></a></li>

        </ul>
        </li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
