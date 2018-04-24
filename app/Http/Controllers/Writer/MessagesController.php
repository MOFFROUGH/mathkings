<?php

namespace App\Http\Controllers\Writer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users\jobs;
use App\Model\Users\messages;
use App\Notifications\NewMessage;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
class MessagesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  public function thread($id)
  {
    //return $id;
    $job=jobs::find($id);
    $user=Auth::user();
    //$jobsall=jobs::select('*')->get();
    $jobsall=jobs::select('*')->where('writer',Auth::user()->id)->get();
    $messages=$user->messages;
    $messages= messages::select('*')->get();

    return view('writer.messages.threadview',compact('job','jobsall','messages'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  // public function create()
  // {
  //   //
  // }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function handler(Request $request,$id)
  {
    //return $request;
    $user=User::find(Auth::user()->id);
    $job=jobs::find($id);
    //return $job->users();
    $message=new messages;
    $message->message=$request->message;
    $message->title=$job->name;
    $message->status='unread';
    $message->user_id=$user->id;
    $message->client=$job->users->id;
    $message->save();
    $message=messages::select('*')->where('message',$request->message)->first();

    $job->messages()->attach($message->id);
    $user->messages()->attach($message->id);
    $note=User::find($job->client);

    $note->notify(new NewMessage($job));

    return redirect()->back()->withMessage('Successfully sent message');
  }
  // public function store(Request $request)
  // {
  //
  //
  // }
  //
  // /**
  // * Display the specified resource.
  // *
  // * @param  int  $id
  // * @return \Illuminate\Http\Response
  // */
  // public function show($id)
  // {
  //   //
  // }
  //
  // /**
  // * Show the form for editing the specified resource.
  // *
  // * @param  int  $id
  // * @return \Illuminate\Http\Response
  // */
  // public function edit($id)
  // {
  //   //
  // }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  // public function update(Request $request, $id)
  // {
  //   //
  // }
  //
  // /**
  // * Remove the specified resource from storage.
  // *
  // * @param  int  $id
  // * @return \Illuminate\Http\Response
  // */
  // public function destroy($id)
  // {
  //   //
  // }
}
