@extends('users/includes/base')
@section('page-head','Home')
@section('page-foot','You are home'.' ' .Auth::user()->name)
@section('home','active')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>

    <li class="active">Home</li>
  </ol>
@endsection
@section('main-content')
<style type="text/css">

.jR3DCarouselGallery,.carousel3d {
margin: 0 auto; /* optional - if want to center align */
}
</style>
<style>
.carousel3d .captions{
position: relative;
padding: 4px 0;
bottom: 27px;
background: orange;
display:block;
font-size: 24;
}
.carousel3d a{
text-decoration: none;
}
</style>

  <div class="col-md-5">
    <h3>gSHJcfkHEGCLHJECGBL</h3>
    @include('errors')
  </div>
  <div class="col-md-6">
    <h3>Highlights</h3>


  </div>



@endsection
