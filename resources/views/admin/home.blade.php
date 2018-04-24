@extends('admin/includes/base')
@section('main-content')
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{count($jobsall)}}</h3>
          <p>Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{count($clients)}}</h3>

          <p>Clients</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{count($writers)}}</h3>
          <p>Writers</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{count($admins)}}</h3>

          <p>Admins</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header ui-sortable-handle" style="cursor: move;">
          <i class="fa fa-envelope"></i>

          <h3 class="box-title">Quick Email</h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            
          </div>
          <!-- /. tools -->
        </div>
        <div class="box-body">
          <form action="#" method="post">
            <div class="form-group">
              <input type="email" class="form-control" name="emailto" placeholder="Email to:">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Subject">
            </div>
            <div class="form-group">
              <textarea class='form-control' placeholder='Email Message'></textarea>
            </div>

          </form>
        </div>
        <div class="box-footer clearfix">
          <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
            <i class="fa fa-arrow-circle-right"></i>
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @forelse ($clients as $client)
                      <li>
                        <img src="{{Storage::disk('local')->url($client->profilepic)}}" alt="User Image">
                        <a class="users-list-name" href="#">{{$client->name}}</a>
                        <span class="users-list-date">{{$client->created_at->diffForHumans()}}</span>
                      </li>
                    @empty

                    @endforelse

                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
    </div>
  </div>

@endsection
