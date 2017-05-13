 <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset("/images/default_user.png") }}" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::guard('admin')->user()->name }}</p>
                        <!-- Status -->
                        {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">Dashboard</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href={{ url('/admin/contests')}}><i class="fa fa-space-shuttle"></i><span>Contests</span></a></li>
                    <li><a href={{ url('/create_contest')}}><i class="fa fa-edit"></i><span>Create New Contest</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa  fa-list"></i><span>Problems</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href={{ url('/problems')}}>All Problems</a></li>
                            <li><a href={{ url('/create_problem')}}>Add New </a></li>
                        </ul>
                    </li>
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>