<?php

namespace App\Providers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Users\jobs;
use App\Model\Users\jobfiles;
use App\Model\Users\revision;
use App\Users;
use App\completejobs;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
            //
    }

    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
