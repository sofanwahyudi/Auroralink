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

        <li class="{{set_active('dashboard')}}"><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


        <li class="{{set_active('suppliers')}}"><a href="{{route('suppliers')}}"><i class="fa fa-truck"></i> <span>Supplier</span></a></li>
        <li class="{{set_active('leads')}}"><a href="{{route('leads')}}"><i class="fa fa-paper-plane-o"></i> <span>Leads</span></a></li>
        <li class="{{set_active('pelanggan')}}"><a href="{{route('pelanggan')}}"><i class="fa fa-users"></i> <span>Pelanggan</span></a></li>
        <li class="treeview {{set_active([
        'sections',
        'sections.create',
        'sections.show',
        'sections.edit',
        'portofolio',
        'portofolio.create',
        'portofolio.show',
        'portofolio.edit',
        'galery',
        'galery.create',
        'galery.edit',
        ])}}">
                <a href="#">
                  <i class="fa fa-th-large"></i> <span>Section</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{set_active('sections')}} "><a href="{{route('sections')}}"><i class="fa fa-th-large"></i> Section</a></li>
                  <li class="{{set_active('portofolio')}}"><a href="{{route('portofolio')}}"><i class="fa fa-image"></i> Portofolio</a></li>
                  <li class="{{set_active('galery')}}"><a href="{{route('galery')}}"><i class="fa fa-image"></i> Galery</a></li>
                </ul>
              </li>
        <li class="treeview {{set_active(['parts','kats','merks','models'])}}">
                <a href="#">
                  <i class="fa fa-cube"></i> <span>Part</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="{{set_active('parts')}} "><a href="{{route('parts')}}"><i class="fa fa fa-cubes"></i> Daftar Part</a></li>
                  <li class="{{set_active('kats')}}"><a href="{{route('kats')}}"><i class="fa fa-circle-o"></i> Part Kategori</a></li>
                  <li class="{{set_active('merks')}}"><a href="{{route('merks')}}"><i class="fa fa-cube"></i> Merk</a></li>
                  <li class="{{set_active('models')}}"><a href="{{route('models')}}"><i class="fa fa-circle-o"></i> Model</a></li>
                </ul>
              </li>
        <li class="treeview {{set_active(['jobs','jasas','catrs','jams'])}}">
                <a href="#"><i class="fa fa-briefcase"></i> <span>Jasa</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li class="{{set_active('jasas')}}"><a href="{{route('jasas')}}"><i class="fa fa-list"></i> <span>Daftar Jasa</span></a></li>
                  <li class="{{set_active('jobs')}}"><a href="{{route('jobs')}}"><i class="fa  fa-thumb-tack"></i> <span>Job</span></a></li>
                  <li class="{{set_active('catrs')}}"><a href="{{route('catrs')}}"><i class="fa  fa-thumb-tack"></i> <span>Kategori Servis</span></a></li>
                  <li class="{{set_active('jams')}}"><a href="{{route('jams')}}"><i class="fa  fa-hourglass-2"></i> <span>Jam Layanan</span></a></li>

              </ul>
        </li>
        <li class="treeview {{set_active(['tickets','cats','status','prioritas'])}}">
            <a href="#"><i class="fa fa-ticket"></i> <span>Ticket</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu ">
            <li class="{{set_active('tickets')}}"><a href="{{  route('tickets')}}"><i class="fa fa-ticket"></i> <span>Daftar Ticket</span></a></li>
            <li class="{{set_active('cats')}}"><a href="{{route('cats')}}"><i class="fa fa-flag"></i> <span>Kategori</span></a></li>
            <li class="{{set_active('status')}}"><a href="{{route('status')}}"><i class="fa fa-angle-double-right"></i> <span>Status</span></a></li>
            <li class="{{set_active('prioritas')}}"><a href="{{route('prioritas')}}"><i class="fa fa-angle-double-right"></i> <span>Prioritas</span></a></li>
            <li><a href="{{url('admin/jasa/kategori_servis')}}"><i class="fa fa-angle-double-right"></i> <span>Comments</span></a></li>
            <li><a href="{{url('admin/jasa/kategori_servis')}}"><i class="fa fa-angle-double-right"></i> <span>Audits</span></a></li>
          </ul>
        </li>
        <li class="treeview {{set_active(['servis'])}}">
                <a href="#"><i class="fa fa-tasks"></i> <span>Task</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li><a href="{{url('admin/task')}}"><i class="fa fa-list"></i> <span>Daftar Task</span></a></li>
                  <li><a href="{{url('admin/task/project')}}"><i class="fa fa-codepen"></i> <span>Project</span></a></li>
                  <li class="{{set_active('servis')}}"><a href="{{route('servis')}}"><i class="fa fa-medkit"></i> <span>Servis</span></a></li>
                {{--  <li class="treeview ">
                    <a href="#"><i class="fa fa-medkit"></i> <span>Servis</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                        <ul class="treeview-menu ">
                            <li class="{{set_active('merks')}}"><a href="{{route('merks')}}"><i class="fa fa-circle-o"></i>Daftar Servis</a></li>
                            <li class="{{set_active('garans')}}"><a href="{{route('garans')}}"><i class="fa fa-tag"></i> Garansi</a></li>
                            <li class="{{set_active('kelengkapans')}}"><a href="{{route('kelengkapans')}}"><i class="fa fa-wheelchair"></i> Kelengkapan</a></li>
                        </ul>
                </li>  --}}

                    <li><a href="{{url('admin/task/support')}}"><i class="fa fa-compress"></i> <span>Support</span></a></li>

              </ul>
        </li>
        <li class="treeview {{set_active(['posts.add','posts','posts.edit','tags','categorys','comments'])}}">
                <a href="#"><i class="fa fa-wordpress"></i> <span>Post</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li class="{{set_active('posts')}}"><a href="{{route('posts')}}"><i class="fa fa-list"></i> <span>Daftar Post</span></a></li>
                  <li class="{{set_active('posts.add')}}"><a href="{{route('posts.add')}}"><i class="fa fa-plus"></i> <span>Tambah Post</span></a></li>
                  <li class="{{set_active('categorys')}}"><a href="{{route('categorys')}}"><i class="fa fa-filter"></i> <span>Kategori</span></a></li>
                  <li class="{{set_active('tags')}}"><a href="{{route('tags')}}"><i class="fa fa-tags"></i> <span> Tags</span></a></li>
                    <li class="{{set_active('comments')}}" ><a href="{{route('comments')}}"><i class="fa fa-commenting-o"></i> <span> Komentar</span></a></li>
              </ul>
        </li>
        <li class="treeview {{set_active(['teams','divs','bagians','team.create','team.show','team.edit'])}}">
                <a href="#"><i class="fa  fa-user-md"></i> <span>Team</span>
                  <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  {{-- <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li> --}}
                  <li class="{{set_active('teams')}}"><a href="{{route('teams')}}"><i class="fa fa-users"></i> <span>Daftar Team</span></a></li>
                  <li class="{{set_active('team.create')}}"><a href="{{route('team.create')}}"><i class="fa fa-plus"></i> <span>Tambah Team</span></a></li>
                  <li class="{{set_active('divs')}}"><a href="{{route('divs')}}"><i class="fa  fa-user-plus"></i> <span>Devisi</span></a></li>
                  <li class="{{set_active('bagians')}}"><a href="{{route('bagians')}}"><i class="fa  fa-user-plus"></i> <span>Bagian</span></a></li>
              </ul>
        </li>
        {{-- <li><a href="#"><i class="fa fa-database"></i> <span>Master</span></a></li> --}}
        @if(Auth::user()->role_id == null)
        <li class="treeview {{set_active(['users','roles'])}}">
          <a href="#"><i class="fa fa-gears"></i> <span>Setting</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu ">
            <li><a href="{{url('perusahaan')}}"><i class="fa fa-building"></i> <span>Perusahaan</span></a></li>
            <li class="{{set_active('users')}} "><a href="{{route('users')}}"><i class="fa fa-group"></i> <span>Pengguna</span></a></li>
            <li class="{{set_active('roles')}} "><a href="{{route('roles')}}"><i class="fa fa-unlock-alt"></i> <span>Role</span></a></li>

        </ul>

        </li>
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
