@include('home/includes/head')
<!--  Header Section  -->
<header>
  <div class="container" >
    <div class="logo pull-left animated wow fadeInLeft"><a href="{{route('guest.home')}}" style="color:white; font-size:16px; font-weight:400;" class="btn animated wow fadeInLeft" data-wow-delay=".1">
      <img src="{{asset('home/logo/logonew170.png')}}" width="120"height="50"alt="MyMathKings" title="kings of maths physics and statistics"/>
    </a>
    </div>

    @section('nav-home-content')
    @show

    <nav class="pull-right">
      <div style="font-weight:200; color:white; opacity:1;">
        <a class="btn animated wow fadeInLeft" data-wow-delay=".1s" href="{{route('login')}}"  style="font-weight:200; color:white; opacity:1;" title="For maths physics and statistics problems">Login</a>
        <a class="btn  animated wow fadeInLeft" data-wow-delay=".1s" href="{{route('register.index')}}" style="font-weight:200; color:white; opacity:1;text-height:2.3" title="get your assignments all done professionally">Register</a>
      </div>
    </nav>

    <span class="burger_icon">menu</span>
  </div>
</header>
<!--  End Header Section  -->
<!--  Hero Section  -->
<section class="hero" id="hero" >
  <div class="container">
    <div class="caption">
      @section('home-content')
      @show

      @section('auth-content')
      @show

    </div>
  </div>
</section>
<!--  End Hero Section  -->
