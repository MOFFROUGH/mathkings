
<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>M</b>MK</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>MyMathKings</b>-Client</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->


    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">{{count(auth()->user()->unreadNotifications->where('type','App\Notifications\NewMessage'))}}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have {{count(auth()->user()->unreadNotifications->where('type','App\Notifications\NewMessage'))}} messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
              @foreach (auth()->user()->unreadNotifications->where('type','App\Notifications\NewMessage') as $notification)
                <li><!-- start message -->
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{asset('userfin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Job Name: {{$notification->data['job']['name']}}
                      <small><i class="fa fa-clock-o"></i> {{$notification->created_at->diffForHumans()}}</small>
                    </h4>
                    <p>{{$notification->data['job']['details']}}</p>
                  </a>
                </li>
                @endforeach
                <!-- end message -->
                
              </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
          </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu" id="markasRead" >
          <a href="{{url('/markAsRead')}}" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{count(auth()->user()->unreadNotifications)}}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have {{count(auth()->user()->unreadNotifications)}} notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                @foreach (auth()->user()->unreadNotifications as $notification)
                  <li>
                      @include('notification.message.'.snake_case(class_basename($notification->type)))

                  </li>
                @endforeach


              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <span class="label label-danger">{{count($jobsreceived)}}</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
              <!-- inner menu: contains the actual data -->

              <ul class="menu">
              @foreach($jobsreceived as $job)
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      {{$job->name}}
                      <small class="pull-right">{{$job->created_at->diffForHumans()}}</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
               
              </ul>
            </li>
            <li class="footer">
              <a href="#">View all tasks</a>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('userfin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{Auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('userfin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

              <p>
                {{Auth::user()->name}}- Client
                <small>Since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </nav>
</header>
