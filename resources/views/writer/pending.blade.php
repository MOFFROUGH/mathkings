@extends('writer/includes/base')
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
      @include('errors')
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Order number</th>
            <th>Name</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>
              Send Message
            </th>
            <th>Upload Finished Work</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jobspending as $job)
            <tr>
              <td>ORD-{{Carbon\Carbon::now()->year }}{{Carbon\Carbon::now()->month}}{{Carbon\Carbon::now()->day}}{{Carbon\Carbon::now()->hour}}{{Carbon\Carbon::now()->minute}}_{{$job->id}}_{{Auth::user()->id}}</td>
              <td>{{$job->name}}</td>
              <td>{{$job->deadline}}</td>
              <td>{{$job->status}}</td>
              <td>
                <a href="{{route('message.writer.thread',$job->id)}}" >
                  <span class="fa fa-comment fa-2x" title="Clarify"></span>
                  </td>
              <td>
                <a href=""  data-toggle="modal" data-target="#upload">
                  <span class="fa fa-paperclip fa-2x" title="Upload File"></span>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" ><span class="fa fa-edit fa-2x" title="Editor"></span>
                  </td>
            </tr>
             <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="">Upload the order file</h4>
            </div>
            <div class="modal-body">
              <form class="" action="{{route('writer.upload',$job->id)}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="uploaded"></label>
                  <input type="file" class="form-control" name="uploaded" id="" placeholder="">

                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default" >Submit</button>

                </div>

              </form>

            </div>

          </div>
        </div>
      </div>
          @endforeach
          <tfoot>
            <tr>
              <th>Order number</th>
              <th>Name</th>
              <th>Deadline</th>
              <th>Status</th>
              <th>
                Send Message
              </th>
              <th>Upload Finished Job</th>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
@endsection
