<?php

namespace App\Http\ViewComposers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users\jobs;
use App\Model\Users\jobfiles;
use App\Model\Users\revision;
use App\Users;
use App\completejobs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
use Illuminate\View\View;


class WriterComposer
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
        $user=Auth::user();
        //$user=Auth::user();
        $jobsall=jobs::select('*')->whereNotIn('status',['complete','received','pending'])->get();
        //$jobsall=$user->jobs;

        //$jobsrevision=jobs::select('*')->where('status','revision')->where('writer',Auth::user()->id)->get();
        $jobsrevision = jobs::QueryD('revision',Auth::user()->id);
        $jobscomplete = jobs::QueryD('complete',Auth::user()->id);
        $jobsrejected = jobs::QueryD('rejected',Auth::user()->id);
        $jobsreceived = jobs::QueryD('received',Auth::user()->id);
        $jobspending = jobs::QueryD('pending',Auth::user()->id);

        // $jobscomplete=jobs::select('*')->where('status','complete')->where('writer',Auth::user()->id)->get();
        // $jobsrejected=jobs::select('*')->where('status','rejected')->where('writer',Auth::user()->id)->get();
        // $jobsreceived=jobs::select('*')->where('status','received')->where('writer',Auth::user()->id)->get();
        // $jobspending=jobs::select('*')->where('status','pending')->where('writer',Auth::user()->id)->get();
        $view
        ->with('jobsall', $jobsall)
        ->with('jobsrevision', $jobsrevision)
        ->with('jobscomplete', $jobscomplete)
        ->with('jobsrejected', $jobsrejected)
        ->with('jobsreceived', $jobsreceived)
        ->with('jobspending',$jobspending);
    }
}
