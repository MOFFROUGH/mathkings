<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('userfin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        <a href="{{route('logout')}}"><i class="fa fa-sign-out text-success"></i> Logout</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <li>
        <a href="{{route('admin.home')}}">
          <i class="@yield('home') fa fa-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="@yield('stateall')"><a href="{{route('admin.all')}}"><i class="fa fa-circle-o text-purple"></i> All Orders<span class="pull-right-container">
        <small class="label pull-right bg-purple">{{count($jobsall)}}</small>
      </span></a></li>
      <li  class="@yield('staterec')"><a href="{{route('admin.received')}}"><i class="fa fa-circle-o text-blue"></i> Received Orders  <span class="pull-right-container">
        <small class="label pull-right bg-blue">{{count($jobsreceived)}}</small>
      </span></a></li>
      <li  class="@yield('statecom')"><a href="{{route('admin.complete')}}"><i class="fa fa-circle-o text-green"></i> Complete Orders  <span class="pull-right-container">
        <small class="label pull-right bg-green">{{count($jobscomplete)}}</small>
      </span></a></li>
      <li  class="@yield('statepen')"><a href="{{route('admin.pending')}}"><i class="fa fa-circle-o text-gray"></i> Pending Orders <span class="pull-right-container">
        <small class="label pull-right bg-gray">{{count($jobspending)}}</small>
      </span></a></li>
      <li  class="@yield('staterev')"><a href="{{route('admin.revision')}}"><i class="fa fa-circle-o text-yellow"></i> Revision Orders <span class="pull-right-container">
        <small class="label pull-right bg-yellow">{{count($jobsrevision)}}</small>
      </span></a></li>
      <li  class="@yield('staterej')"><a href="{{route('admin.rejected')}}"><i class="fa fa-circle-o text-red"></i> Rejected Orders <span class="pull-right-container">
        <small class="label pull-right bg-red">{{count($jobsrejected)}}</small>
      </span></a></li>
      <li>
        <a href="">
          <i class="fa fa-bell"></i> <span>Notifications</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
      <li>
        <a href="pages/mailbox/mailbox.html">
          <i class="fa fa-envelope"></i> <span>Messages</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-yellow">12</small>
            <small class="label pull-right bg-green">16</small>
            <small class="label pull-right bg-red">5</small>
          </span>
        </a>
      </li>
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
