@extends('users/includes/base')
@section('page-head','Pending Orders')
@section('page-foot','Showing Pending Orders.')
@section('statepen','active')
@section('order','active')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Orders</a></li>
    <li class="active">Pending Orders</li>
  </ol>
@endsection
@section('main-content')
  <div class="box-body">
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Order number</th>
            <th>Name</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Start Chat</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($jobspending as $job)
            <tr>
              <td>ORD-{{Carbon\Carbon::now()->year }}{{Carbon\Carbon::now()->month}}{{Carbon\Carbon::now()->day}}{{Carbon\Carbon::now()->hour}}{{Carbon\Carbon::now()->minute}}_{{$job->id}}_{{Auth::user()->id}}</td>
              <td>{{$job->name}}</td>
              <td>{{$job->deadline}}</td>
              <td>{{$job->status}}</td>
              <td><a href="{{route('message.thread',$job->id)}}">
                 <i class="fa fa-comments fa-2x text-green"></i>
               </a> </td>
            </tr>
          @empty
            <tr>
              <td>
                No Pending Orders
              </td>
            </tr>
          @endforelse
          <tfoot>
            <tr>
              <th>Order number</th>
              <th>Name</th>
              <th>Deadline</th>
              <th>Status</th>
              <th>Start Chat</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
@endsection
