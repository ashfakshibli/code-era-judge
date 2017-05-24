        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <span class="logo-mini"><b>C</b>E</span>
                  <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Code</b>Era</span>
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
                                <li><a href="/" class="btn btn-flat bg-blue">CodeEra Home</a></li>


                        <!-- Notifications Menu -->
                        <li class="dropdown notifications-menu">
                            <!-- Menu toggle button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">1</span>
                            </a>
                            <ul class="dropdown-menu">

                                <li>
                                    <!-- Inner Menu: contains the notifications -->
                                    <ul class="menu">
                                    @foreach(App\Http\Controllers\HomeController::notify() as $contest)
                                    @php
                                        $current = Carbon\Carbon::now('Asia/Dhaka');
                                        $startTime = Carbon\Carbon::parse($contest->start_time); 
                                        $differ = Carbon\Carbon::parse($current)->diffForHumans($startTime, true)
                                      //var_dump(Auth::check());       
                                      //dd(Carbon\Carbon::now('Asia/Dhaka')->gt(Carbon\Carbon::parse($contest->start_time)));       
                                    @endphp

                                    @if(Carbon\Carbon::parse($current)->lt($startTime))
                                        <li><!-- start notification -->
                                            <a href="#">
                                                <i class="fa fa-info text-aqua"></i>
                                                {{$contest->title}} is starting in {{ $differ }}

                                            </a>
                                        </li><!-- end notification -->
                                    @else
                                    <li><!-- start notification -->
                                            <a href="#">
                                                <i class="fa fa-info text-aqua"></i>
                                                No new notification

                                            </a>
                                        </li><!-- end notification -->
                                        @php
                                        break;
                                        @endphp
                                    @endif
                                    @endforeach
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ asset("/images/default_user.png") }}" class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ asset("/images/default_user.png") }}" class="img-circle" alt="User Image" />
                                    <p>
                                        {{ Auth::user()->name }}
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
                                        <a href="/contestant/profile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        {{-- <a href="{{ url('/admin_logout') }}" class="btn btn-default btn-flat">Sign out</a> --}}

                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form1').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
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