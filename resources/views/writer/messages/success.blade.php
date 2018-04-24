@extends('users/includes/base')
@section('page-head','Payment Order')
@section('page-foot',' Showing Payment Details')

@section('main-content')
  <div class="col-md-3"></div>
  @include('errors')
  <div class="col-md-6 " style="border-radius: 8px"><h4 class="col-md-offset-1">
    <b>Thanks</b></h4><hr />
    <div>
      <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-thumbs-up"></i> Thanks For Placing an Order with Us</h4>
                      Our most Proficient Writers will get to look at your job and they will respond via the messaging system.
                    </div>
    </div>
    <p>
      <script>
        alertify.success("Successfully Placed Your Order");
      </script>
    </p>
  </div>
  @endsection
