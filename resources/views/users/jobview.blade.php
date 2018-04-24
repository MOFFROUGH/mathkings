@extends('users/includes/base')
@section('page-head','All Orders')
@section('page-foot','Showing All Orders.')
@section('stateall','active')
@section('order','active')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Received jobs</a></li>
    <li class="active">View File</li>
  </ol>
@endsection
@section('main-content')
  <div class="box-body">
    <div class="box-body">

     <a href="{{ Storage::disk('local')->url($jobbb->name)}}" target="_blank">View File</a>
     <div class="box-body">
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Order Name</th>
            <th>Time Submitted</th>
            <th>View File</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          @forelse ($jobsall as $job)
            <tr>
              <td>{{$jobbb->job_name}}</td>
              <td>{{$job->created_at->diffForHumans()}}</td>
              <td><a href="{{ Storage::disk('local')->url($jobbb->name)}}" target="_blank">View File</a></td>
              <td><a href="{{route('order.accepted',$jobbb->job_id)}}" class="btn btn-success btn-xs">Accept</a>&nbsp;<a  data-toggle="modal" data-target="#revise-{{$jobbb->job_id}}" href=""  class="btn btn-danger btn-xs">Revision</a></td>

            </tr>
            <div class="modal fade" id="revise-{{$jobbb->job_id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="">Revision Notes</h4>
                    <small>Please note, asking for a job revision alerts the support team and we will review
                    the work and determine if the Revision call was necessary. We guarantee high quality work
                  and if the Writer is found at fault he/she shall ne penalised.</small>
                  </div>
                  <div class="modal-body">
                    <form role="form" id="" class="" action="{{route('order.revision',$jobbb->job_id)}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="revisionnotes">Revision Notes</label>
                        <textarea class='form-control' name="revisionnotes" id="revisionnotes" placeholder='Please insert your point of concern' ></textarea>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ask for Revision</button>
                      </div>


                    </form>

                  </div>

                </div>
              </div>
            </div>
          @empty
            <tr>
              <td>
                No Such job
              </td>
            </tr>



          @endforelse
          <tfoot>
            <tr>
              <th>Order Name</th>
            <th>Time Submitted</th>
            <th>View File</th>
            <th>Action</th>

            </tr>
          </tfoot>
        </table>
      </div>
    </div>

      </div>
    </div>
  @endsection
