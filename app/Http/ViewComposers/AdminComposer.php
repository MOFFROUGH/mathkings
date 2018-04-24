<?php

namespace App\Http\ViewComposers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users\jobs;
use App\Model\Users\jobfiles;
use App\Model\Users\revision;
use App\completejobs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
use Illuminate\View\View;
use App\User;

class AdminComposer
{
    /**
    * The user repository implementation.
    *
    * @var UserRepository
    */

    /**
    * Create a new profile composer.
    *
    * @param  UserRepository  $users
    * @return void
    */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...

    }

    /**
    * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {

        $jobsall=jobs::select('*')->get();
        $jobsrevision=jobs::where('status','revision')->get();
        $jobscomplete=jobs::where('status','complete')->get();
        $jobsrejected=jobs::where('status','rejected')->get();
        $jobsreceived=jobs::where('status','received')->get();
        $jobspending=jobs::where('status','pending')->get();
        // $clients = User::with('roles')->where('roles.role','admin')->get();
        $clients = User::whereHas('roles',function($q){
            $q->where('role','client');
        })->get();
        $admins = User::whereHas('roles',function($q){
            $q->where('role','admin');
        })->get();
        $writers = User::whereHas('roles',function($q){
            $q->where('role','writer');
        })->get();
        $view
        ->with('jobsall', $jobsall)
        ->with('jobsrevision', $jobsrevision)
        ->with('jobscomplete', $jobscomplete)
        ->with('jobsrejected', $jobsrejected)
        ->with('jobsreceived', $jobsreceived)
        ->with('clients', $clients)
        ->with('writers', $writers)
        ->with('admins', $admins)
        ->with('jobspending',$jobspending);
    }
}
