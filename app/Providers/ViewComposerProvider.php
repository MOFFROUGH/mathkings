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

class ViewComposerProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        $WriterViewArray = [
            'writer.all','writer.complete','writer.pending',
            'writer.home','writer.received','writer.rejected',
            'writer.revision','writer.messages.threadview'
        ];
        $ClientViewArray = [
            'users.all','users.complete','users.pending',
            'users.home','users.received','users.rejected',
            'users.revision','users.includes.header','users.includes.sidebar'
        ];
        $AdminViewArray = [
            'admin.all','admin.complete','admin.pending',
            'admin.home','admin.received','admin.rejected',
            'admin.revision','admin.home2','admin.home3','admin.home4'
        ];
        view()->composer($WriterViewArray,'App\Http\ViewComposers\WriterComposer');
        view()->composer($ClientViewArray,'App\Http\ViewComposers\ClientComposer');
        view()->composer($AdminViewArray,'App\Http\ViewComposers\AdminComposer');
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
