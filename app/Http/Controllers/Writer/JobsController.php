<?php

namespace App\Http\Controllers\Writer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users\jobs;
use App\Model\Users\jobfiles;
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
    // public function index()
    // {
    //     //
    // }
    public function all()
    {
        return view('writer.all');
    }

    // handles the revision jobs
    public function revision()
    {
        return view('writer.revision');

    }

    //handles all the complete jobs
    public function complete()
    {
        return view('writer.complete');
    }

    //handles rejected jobs
    public function rejected()
    {
        return view('writer.rejected');

    }

    //handles received jobs
    public function received(){

        return view('writer.received');
    }
    //handles pending jobs
    public function pending()
    {
        return view('writer.pending');

    }

    public function upload(Request $request, $id)
    {
        $job= jobs::find($id);
        //return $job;
         $newjob=new completejobs;
         $newjob->name=$request->uploaded->store('public/complete');
         $newjob->job_name=$job->name;
         $newjob->job_id= $job->id;
         $newjob->save();
         $job->status='received';
         $job->save();
        return view('writer.all');

    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    // public function create()
    // {
    //     //
    // }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    // public function show($id)
    // {
    //     //
    // }
    public function accept($id)
    {
        $job= jobs::find($id);
        $user= Auth::user();
        $job->status="pending";
        $job->writers()->associate($user->id);
        $job->save();
        return redirect(route('writer.all'))->withMessage('Successfully accepted order');

        //return $job;
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    // public function edit($id)
    // {
    //     //
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
    //     //
    // }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    // public function destroy($id)
    // {
    //     //
    // }
}
