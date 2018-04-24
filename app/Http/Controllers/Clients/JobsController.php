<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users\jobs;
use App\Model\Users\jobfiles;
use App\Model\Users\revision;
use App\Users;
use App\completejobs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;


class JobsController extends Controller
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
   public function viewer($id)
  {
    $user=Auth::user();
 //return $id;
    $jobbb=completejobs::where('job_id',$id)->first();
    //return $jobbb;
    //$jobsall=$user->jobs;

    return view('users.jobview',compact('jobbb'));
  }


  public function orderAccept($id)
  {
    $user=Auth::user();
    $job= jobs::find($id);
    $job->status= "complete";
    $job->save();

    return view('users.users',compact('jobbb'));
  }

  public function orderRevise(Request $request ,$id)
  {

    $user=Auth::user();
    $job= jobs::find($id);
    $job->status= "revision";
    $job->save();

    $revision= new revision;
    $revision->notes= $request->revisionnotes;
    $revision->job_id=$id;
    $revision->save();


    return view('users.users',compact('jobbb'));
  }
  //handles all the job orders
  public function all()
  {
    $user=Auth::user();
    //$jobsall=$user->jobs;

    return view('users.all');
  }

  // handles the revision jobs
  public function revision()
  {
    $user=Auth::user();
    //$jobsall=$user->jobs;

    return view('users.revision');

  }

  //handles all the complete jobs
  public function complete()
  {

    $user=Auth::user();
    //$jobsall=$user->jobs;

    return view('users.complete');
  }

  //handles rejected jobs
  public function rejected()
  {
    $user=Auth::user();
    //$jobsall=$user->jobs;

    return view('users.rejected');

  }

  //handles received jobs
  public function received()
  {

    $user=Auth::user();
    //$jobsall=$user->jobs;

    return view('users.received');
  }
  //handles pending jobs
  public function pending()
  {
    $user=Auth::user();
    //$jobsall=$user->jobs;

    return view('users.pending');

  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //return $deadline;
    $job=new jobs;

    $this->validate($request,[
      'title'=>'required',
      'details'=>'required',
      'price'=>'required',
      'days'=>'required_without:hours',
      'hours'=>'required_without:days',
    ]);

    $deadline=Carbon::now(+3);
    $deadline->addDays($request->days);
    $deadline->addHours($request->hours);
    $job->name = $request->title;
    $job->details = $request->details;
    $job->price = $request->price;
    $job->client = Auth::user()->id;
    $job->deadline = $deadline;
    $job->status = 'new';
    $user=Auth::user();
    $job->save();
    $job=jobs::where('name', $request->title)->first();
    foreach($request->file('files') as $file){

      $details= new jobfiles;
      $details->name=$file->store('public/images');
      $details->jobs_id= $job->id;
      $details->save();
    }
    //$user->jobs()->attach($job->id);
    return redirect(route('paywithpaypal',$job->id));

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
