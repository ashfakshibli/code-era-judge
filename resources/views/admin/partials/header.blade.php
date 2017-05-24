        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/admin_home" class="logo">
                <span class="logo-mini"><b>C</b>A</span>
                  <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>CodeEra</b> Admin</span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                    <li><a href="/" class="btn btn-flat bg-red">CodeEra Home</a></li>


                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ asset("/images/default_user.png") }}" class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset("/images/default_user.png") }}" class="img-circle" alt="User Image" />
                                    <p>
                                        {{ Auth::guard('admin')->user()->name }}
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                {{-- <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li> --}}
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        {{-- <a href="{{ url('/admin_logout') }}" class="btn btn-default btn-flat">Sign out</a> --}}

                                        <a href="{{ route('admin_logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>