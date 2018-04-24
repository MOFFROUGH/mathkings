<?php

namespace App\Http\Controllers\Clients;
use App\User;
use App\Model\Users\roles;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Event ;
use App\Events\NewUser;
class LoginController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

  //custom login
  public function login(Request $request)
  {
  //dd($request->all());
    if (Auth::attempt([
      'email'=> $request->email,
      'password'=>$request->password,
    ]))
    {
//Event::fire(new NewUser());
$user = User::where('email',$request->email)->first();
//redirectRequest($request);
if ($user->is_Activated()) {
  //check if they are admin
  if ($user->is_Admin())
  {
    return redirect(route('admin.home'));
  }
  //or they are Clients
  elseif ($user->is_Client())
  {
    return redirect(route('client.home'));
  }
  //or they are writers
  elseif ($user->is_Writer())
  {
    return redirect(route('writer.home'));
  }
  //default with error
  else
  {
    Auth::logout();
    return 'Credentials dont match a category';
  }
}
else {
  //Auth::logout();
  return view('activate');
}



    }
    else {
      return redirect(route('guest.home'));
    }
  }
  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function redirectRequest($request)
{
  //find the user associated with the credentials
  //return $request;
    $user = User::where('email',$request->email)->first();

  if ($user->is_Activated()) {
    //check if they are admin
    if ($user->is_Admin())
    {
      return redirect(route('admin.home'));
    }
    //or they are Clients
    elseif ($user->is_Client())
    {
      return redirect(route('client.home'));
    }
    //or they are writers
    elseif ($user->is_Writer())
    {
      return redirect(route('writer.home'));
    }
    //default with error
    else
    {
      Auth::logout();
      return 'Credentials dont match a category';
    }
  }
  else {
    //Auth::logout();
    return redirect(route('email.confirmation'));
  }

}
  
}
