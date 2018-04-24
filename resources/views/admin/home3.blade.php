@extends('admin/includes/base')
@section('main-content')
  <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inbox</span>
                <span class="info-box-number">3</span>
                <span class="info-box-text">To Do</span>
                <span class="info-box-number">6</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">440</span>
                <span class="info-box-text">Shares</span>
                <span class="info-box-number">20</span>
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
              <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Events</span>
                <span class="info-box-number">2-12-2018</span>
                <span class="info-box-text">Reminder</span>
                <span class="info-box-number">Today 5:00</span>
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
                <span class="info-box-text">All Clients</span>
                <span class="info-box-number">{{count($clients)}}</span>
                <span class="info-box-text">Client Issues</span>
                <span class="info-box-number">{{count($clients)}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
  
<div class="col-md-6">
  <h2>Clients Data</h2>
  <div class="box-body">
    <table id="Clientsdata" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">
            Name
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort  columnascending" style="width: 226px;">Orders
          </th>
          <th class="sorting" tabindex="0"aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">Revision
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 153px;">History
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 113px;">View
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($clients as $client)
          <tr role="row" class="odd">
            <td>{{$client->name}}</td>
            <td>{{count($client->jobs)}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->roles[0]['role']}}</td>
            <td><a href="#" class="btn btn-xs btn-info">View</a></td>
          </tr>
        @empty
          <tr role="row" class="odd">
            <td colspan="5">No Admins</td></tr>

        @endforelse

      </tbody>

    </table>
  </div>
</div>
<div class="col-md-6">
  <h2>Admins Data</h2>
  <div class="box-body">
    <table id="Adminsdata" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
      <thead>
        <tr role="row">
          <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177px;">
            Name
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort  columnascending" style="width: 226px;">Role
          </th>
          <th class="sorting" tabindex="0"aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 206px;">View
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 153px;">Time
          </th>
          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 113px;">Misc
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse ($admins as $admin)
          <tr role="row" class="odd">
            <td class="sorting_1">{{$admin->name}}</td>
            <td>{{$admin->roles[0]['role']}}</td>
            <td>{{count($admin->roles())}}</td>
            <td>{{$admin->created_at->diffForHumans()}}</td>
            <td><a href="#" class="btn btn-xs btn-info">View</a></td>
          </tr>
        @empty
          <tr role="row" class="odd">
            <td colspan="5">No Admins</td></tr>

        @endforelse

      </tbody>

    </table>
  </div>
</div>
<style>
.box-body{
  background-color: transparent
}
</style>
@endsection
