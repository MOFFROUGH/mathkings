@extends('users/includes/base')
@section('page-head','Messages')
@section('page-foot',' Showing Message Thread for'.' ' . $job->name)

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-md-11">
        <div class="panel panel-default">
          <div class="panel-heading">Job Thread</div>
          <div class="panel-body">
            <table id="" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Order number</th>
                  <th>Name</th>
                  <th>Details</th>
                  <th>Deadline</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    {{$job->id}}
                  </td>
                  <td>
                    {{$job->name}}
                  </td>
                  <td>
                    {{$job->details}}
                  </td>
                  <td>
                    {{$job->deadline}}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-11">
        <div class="panel panel-default">
          <div class="panel-heading">Chat Thread</div>
          <div class="panel-body">
            <div class="col-md-12">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <div class="box-tools pull-right">
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    @forelse ($messages as $message)
                      @if ($message->user_id==auth()->user()->id)
                        <div class="direct-chat-msg">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">Me</span>
                            <span class="direct-chat-timestamp pull-right">{{$message->created_at->diffForHumans()}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('userfin/dist/img/user1-128x128.jpg')}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            {{ $message->message}}
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                      @else
                        <!-- Message to the right -->
                        <div class="direct-chat-msg right">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-right">Writer</span>
                            <span class="direct-chat-timestamp pull-left">{{$message->created_at->diffForHumans()}}</span>
                          </div>
                          <!-- /.direct-chat-info -->
                          <img class="direct-chat-img" src="{{asset('userfin/dist/img/user3-128x128.jpg')}}" alt="message user image">
                          <!-- /.direct-chat-img -->
                          <div class="direct-chat-text">
                            {{ $message->message}}
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>
                        <!-- /.direct-chat-msg -->
                      @endif
                    @empty

                    @endforelse
                    <!-- /.direct-chat-pane -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <form action="{{route('message.handler',$job->id)}}" method="post">
                      {{csrf_field()}}
                      <div class="input-group">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-warning btn-flat">Send</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  @endsection
