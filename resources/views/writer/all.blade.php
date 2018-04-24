@extends('writer/includes/base')
@section('page-head','All Orders')
@section('page-foot','Showing All Orders.')
@section('stateall','active')
@section('order','active')
@section('breadcrumb')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Orders</a></li>
    <li class="active">All Orders</li>
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
            <th>Accept</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jobsall as $job)
            <tr>
              <td>ORD-{{Carbon\Carbon::now()->year }}
                {{Carbon\Carbon::now()->month}}{{Carbon\Carbon::now()->day}}
                {{Carbon\Carbon::now()->hour}}{{Carbon\Carbon::now()->minute}}
                _{{$job->id}}_{{Auth::user()->id}}</td>
                <td>{{$job->name}}</td>
                <td>{{$job->deadline}}</td>
                <td>{{$job->status}}</td>
                <td>
                  @if (count($jobspending)>0)
                    <a href="" class="btn  btn-default" data-toggle="modal" data-target="#finish">
                      <i class="fa fa-check fa-2x text-green"></i>
                    </a>

                  @else
                    <a href="" class="btn  btn-default" data-toggle="modal" data-target="#accept-{{$job->id}}">
                      <i class="fa fa-check fa-2x text-green"></i>
                    </a>

                  @endif


                </td>
                @include('errors')
                <div class="modal fade" id="accept-{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Order Acceptance Certificate</h4>
                        <input type="hidden" id="hidden_id" value="1">
                      </div>
                      <div class="modal-body">
                        <div>
                          <h4 class="text-warning">Read these instruction carefully before accepting the job, Any Erroneous Work resulting from
                            Direct misinterpretation of these guidelines will result into derating, ban or even closure of your
                            account.</h4><br />
                            <hr />
                          </div>
                          <div class="">
                            <small class="text-danger">The Job name</small><br />
                            {{$job->name}}
                            <hr />
                          </div>
                          <div class="">
                            <small class="text-danger">The Job Details</small><br />
                            {{$job->details}}
                            <hr />
                          </div>
                          <div class="">
                            <small class="text-danger">This job is Worth</small><br />
                            {{$job->price*0.7}} Dollars
                            <hr />
                          </div>
                          <div>
                            By accepting this order, I agree that I understand the <a href="">Terms and Conditions</a> of engagement and delivery.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a href="{{route('writer.accept',$job->id)}}" class="btn btn-primary">Accept Order</a>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </tr>
              @endforeach
              <tfoot>
                <tr>
                  <th>Order number</th>
                  <th>Name</th>
                  <th>Deadline</th>
                  <th>Status</th>
                  <th>Accept</th>
                </tr>
              </tfoot>
            </table>
          </div>

          {{-- modal 2 --}}

        </div>
      </div>
      <div class="modal fade" id="finish" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             <h4 class="modal-title" id="myModalLabel">Slow Down!!</h4>
             <input type="hidden" id="hidden_id" value="1">
           </div>
           <div class="modal-body">
             <div>
               <h2>Finish your Pending jobs and get a new one</h2>
             </div>

             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
             </div>

         </div>
       </div>
     </div>
     </tr>

   <tfoot>
     <tr>
       <th>Order number</th>
       <th>Name</th>
       <th>Deadline</th>
       <th>Status</th>
       <th>Accept</th>
     </tr>
   </tfoot>
 </table>
</div>
      @endsection
