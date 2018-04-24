<?php

namespace App\Listeners;

use App\Events\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\NewUserActivate;
class SendWelcomeMail implements ShouldQueue
{
    use InteractsWithQueue;
    // /**
    // * Create the event listener.
    // *
    // * @return void
    // */
    public function __construct()
    {
        //
    }

    /**
    * Handle the event.
    *
    * @param  NewUser  $event
    * @return void
    */
    public function handle(NewUser $event)
    {
        //dd($event->user->email);
        Mail::to($event->user->email)->send(new NewUserActivate($event->user));
        return redirect(url('/'));
    }
}
