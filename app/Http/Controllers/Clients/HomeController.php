<?php

namespace App\Http\Controllers\Clients;
use App\Model\Users\jobs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth ;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // //$jobsall=jobs::select('*')->get();
      // $user=Auth::user();
      // //$jobsall=jobs::select('*')->get();
      // $jobsall=$user->jobs;
      // $jobsrevision=jobs::select('*')->where('status','revision')->get();
      // $jobscomplete=jobs::select('*')->where('status','complete')->get();
      // $jobsrejected=jobs::select('*')->where('status','rejected')->get();
      // $jobsreceived=jobs::select('*')->where('status','received')->get();
      // $jobspending=jobs::select('*')->where('status','pending')->get();
      return view('users.users');

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
        //
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
