@extends('home/includes/base')
{{-- create the main navbar --}}
@section('nav-home-content')
  <nav class="pull-left">
    <ul class="list-unstyled" style="font-weight:200; color:white; opacity:1;">
      <a class="btn animated wow fadeInLeft" data-wow-delay=".1s" href="#app-features"  style="font-weight:200; color:white; opacity:1;">Services</a>
      <a class="btn  animated wow fadeInLeft" data-wow-delay=".1s" href="#about" style="font-weight:200; color:white; opacity:1;text-height:2.3">About</a>
    </ul>
  </nav>
@endsection
{{-- Background images --}}
@section('home-content')
  @include('errors')
  <h1 class="text-uppercase  animated wow fadeInLeft">We at MyMathKings Work on your Math problems Professionally</h1>
  <p class=" animated wow fadeInLeft">Accuracy, Timeliness and Pocket-friendly</p>

  <a href="#" class="app_store_btn text-uppercase animated wow fadeInLeft">

    <span>Online math courses</span>
  </a>
  <a href="#" class="app_store_btn text-uppercase animated wow fadeInLeft">

    <span>math assignments and tests</span>
  </a>
@endsection
{{-- Created by Moffat Munene, @moffmu, moffmu@gmail.com --}}
{{-- Copyright of the Mymathkings, subsidiary of Kings Inc. See terms and conditions   --}}
