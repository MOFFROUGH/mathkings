<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Model\Users\comments;
use App\Mail\NewUserActivate;
use App\Mail\NewComment;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('home');
    }



    public function admin()
    {
        return view('admin.home');
    }



    public function emailactivation()
    {
        return view('activate');
    }



    public function emailsubscribe(Request $request)
    {
        //return $request;
        $this->validate($request,[
            'email'=>'required',
            'comment'=>'required'
        ]);
        $comment = new comments;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->sourcepage = 'guest.home-index';
        $comment->save();
        $comment = comments::where('comment', $request->comment)->first();
        //return $comment;
        Mail::to("moffmu@gmail.com")->send(new NewComment($comment));

        return redirect(route('guest.home'))->withMessage("Thanks for your feeback");
    }

    //activate account
    public function accountverify($key)
    {
        $user = User::where('key',$key)->first();
        //dd($user);

        if (!$user) {
            return view('activate');
        }
        else {
            $user->activation = 'activated';
            $user->save();
            //Auth::logout();
            return redirect(route('login'))->withMessage('Account Successfully activated');
        }
    }


    public function mail()
    {

        $touser = [

            "region" => "joy",
            "price" => "moffhub"

        ];
        //$v=json_encode($arr);

        //$touser=json_encode($touser);
        //return $arr['region'];
        Mail::to("moffmu@gmail.com")->send(new NewUserActivate);
        return redirect(route('guest.home'));
    }
}
