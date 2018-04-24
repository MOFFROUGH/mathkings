@extends('writer/includes/base')
@section('page-head','Revision Orders')
@section('page-foot','Showing Revision Orders.')
@section('staterev','active')
@section('order','active')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Orders</a></li>
    <li class="active">Revision Orders</li>
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
            <th>View Revision Notes</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jobsrevision as $job)
            <tr>
              <td>ORD-{{Carbon\Carbon::now()->year }}{{Carbon\Carbon::now()->month}}{{Carbon\Carbon::now()->day}}{{Carbon\Carbon::now()->hour}}{{Carbon\Carbon::now()->minute}}_{{$job->id}}_{{Auth::user()->id}}</td>
              <td>{{$job->name}}</td>
              <td>{{$job->deadline}}</td>
              <td>{{$job->status}}</td>
              <td> <a href=""> <i class="fa fa-keyboard-o fa-2x text-green"></i></a></td>
              <td> <a href=""><span class="fa fa-paperclip fa-2x" title="Upload File"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=""><span class="fa fa-edit fa-2x" title="Edit"></span></a>
            </td>
            </tr>
          @endforeach
          <tfoot>
            <tr>
              <th>Order number</th>
              <th>Name</th>
              <th>Deadline</th>
              <th>Status</th>
              <th>View Revision note</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
@endsection
