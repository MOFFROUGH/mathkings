@extends('writer/includes/base')
@section('page-head','Rejected Orders')
@section('page-foot','Showing Rejected Orders.')
@section('staterej','active')
@section('order','active')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Orders</a></li>
    <li class="active">Rejected Orders</li>
  </ol>
@endsection
@section('main-content')
  <div class="box-body">
      @include('errors')
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Order number</th>
            <th>Name</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Change Price</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jobsrejected as $job)
            <tr>
              <td>ORD-{{Carbon\Carbon::now()->year }}{{Carbon\Carbon::now()->month}}{{Carbon\Carbon::now()->day}}{{Carbon\Carbon::now()->hour}}{{Carbon\Carbon::now()->minute}}_{{$job->id}}_{{Auth::user()->id}}</td>
              <td>{{$job->name}}</td>
              <td>{{$job->deadline}}</td>
              <td>{{$job->status}}</td>
              <td> <a href=""> <i class="fa fa-dollar fa-2x text-green"></i></a></td></td>
            </tr>
          @endforeach
          <tfoot>
            <tr>
              <th>Order number</th>
              <th>Name</th>
              <th>Deadline</th>
              <th>Status</th>
              <th>Change Price</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
@endsection
