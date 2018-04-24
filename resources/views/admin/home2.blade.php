@extends('admin/includes/base')
@section('main-content')
  <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All Orders</span>
                <span class="info-box-number">{{count($jobsall)}}</span>
                <span class="info-box-text">Pending Orders</span>
                <span class="info-box-number">{{count($jobspending)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-inbox"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Revision Orders</span>
                <span class="info-box-number">{{count($jobsrevision)}}</span>
                <span class="info-box-text">Complete Orders</span>
                <span class="info-box-number">{{count($jobscomplete)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Payments</span>
                <span class="info-box-number">2,000,000</span>
                <span class="info-box-text">Profits</span>
                <span class="info-box-number">30,000</span>
              </div>

              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">All Writers</span>
                <span class="info-box-number">{{count($writers)}}</span>
                <span class="info-box-text">Writer Issues</span>
                <span class="info-box-number">{{count($writers)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
<div class="col-md-6">
  <h2>Orders Data</h2>
  <div class="box-body">
    <table id="Ordersdata" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">
            Order id
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort  columnascending" style="width: 226px;">Status
          </th>
          <th class="sorting" tabindex="0"aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Client
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 153px;">Writer
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 113px;">View
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($jobsall as $job)
          <tr role="row" class="odd">
            <td>ORD-{{$job->id}}</td>
            <td>{{$job->status}}</td>
            <td>{{$job->users->name}}</td>
            <td>{{$job->writers->name}}</td>
            <td><a href="#" class="btn btn-xs btn-info">View</a></td>
          </tr>
        @empty
          <tr role="row" class="odd">
            <td>No Orders</td></tr>

        @endforelse

      </tbody>
      
    </table>
  </div>
</div>
<div class="col-md-6">
  <h2>Writers Data</h2>
  <div class="box-body">
    <table id="Writersdata" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">
            Name
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort  columnascending" style="width: 226px;">Orders
          </th>
          <th class="sorting" tabindex="0"aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Penalties
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 153px;">Amount
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 113px;">View
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($writers as $writer)
          <tr role="row" class="odd">
            <td>{{$writer->name}}</td>
            <td>{{count($writer->jobs)}}</td>
            <td>{{$writer->email}}</td>
            <td>{{$writer->roles[0]['role']}}</td>
            <td><a href="#" class="btn btn-xs btn-info">View</a></td>
          </tr>
        @empty
          <tr role="row" class="odd">
            <td>No Admins</td></tr>

        @endforelse
      </tbody>
      
    </table>
  </div>
</div>

<style>
.box-body{
  background-color:transparent
}
</style>
@endsection
