
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <div class="col-md-offset-2">
        <small>The journey Starts here!!</small><br>
        <small>Our Clients Rated you at <span class="badge">3.2</span> Stars </small>
      </div>
      
    </h1>
    @yield('breadcrumb')
  </section>
  @include('errors')
  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">@yield('page-head')</h3>


      </div>
      <div class="box-body">
        @section('main-content')
        @show
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <b>@yield('page-foot')</b>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<div class="modal fade" id="new_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Order</h4>
        <input type="hidden" id="hidden_id" value="1">
      </div>
      <div class="modal-body">
        <form role="form" action="{{route('job.store')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class="form-group">
            <label for="Name">Order Title</label>
            <input type="text" id="title" name="title" placeholder="Order Title" class="form-control" />
          </div>
          <div class="form-group">
            <label for="Name">Order Details</label>
            <input type="text" id="details" name="details" placeholder="Order Description" class="form-control" />
          </div>
          <div class="form-group">
            <label for="Name">Price you want to pay</label>
            <input type="text" id="price" name="price" placeholder="Enter your preferred price" class="form-control" />
          </div>
          <div class="form-group">
            <label for="days">Select Deadline (Days):</label>
            <select class="form-control" id="days" name="days">
              <option  selected disabled value=''>Select days</option>
              <option value='1'>1 day</option>
              <option value='2'>2 days</option>
              <option value='3'>3 days</option>
              <option value='4'>4 days</option>
              <option value='5'>5  days</option>
              <option value='6'>6 days</option>
              <option value='7'>7 days</option>
              <option value='8'>8 days</option>
              <option value='9'>9 days</option>
              <option value='10'>10 days</option>
              <option value='11'>11 days</option>
              <option value='12'>12 days</option>
              <option value='15'>15 days</option>
              <option value='18'>18 days</option>
              <option value='21'>21 days</option>
            </select>
          </div>
          <div class="form-group">
            <label for="hours">Select Deadline (Hours):</label>
            <select class="form-control" id="hours" name="hours">
              <option  selected disabled value=''>Select hours</option>
              <option value='1'>1 hour</option>
              <option value='2'>2 hours</option>
              <option value='3'>3 hours</option>
              <option value='4'>4 hours</option>
              <option value='5'>5  hours</option>
              <option value='6'>6 hours</option>
              <option value='7'>7 hours</option>
              <option value='8'>8 hours</option>
              <option value='9'>9 hours</option>
              <option value='10'>10 hours</option>
              <option value='11'>11 hours</option>
              <option value='12'>12 hours</option>
              <option value='15'>15 hours</option>
              <option value='18'>18 hours</option>
              <option value='21'>21 hours</option>
            </select>
          </div>

          <div class="form-group">
            <label for="files">Photos, Files </label>
            <input type="file" id="" name="files[]" multiple="multiple" placeholder="Files" class="form-control" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Place Order</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!------------------------------------------------Modal---------------------------------------------------------------------->
