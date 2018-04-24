<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password','profilepic','activation','key'
    ];
    //protected $events = [
      //'created' => Events\NewUser::class
  //  ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//relationship between user and messages
    public function messages(){

     return $this->belongsToMany('App\Model\Users\messages', 'message_user');
 }
     //relationship between user and roles
 public function roles(){
     return $this->belongsToMany('App\Model\Users\roles', 'role_user');
 }
     //relationship between user and jobs
 public function jobs(){
     return $this->HasMany('App\Model\Users\jobs', 'client');
 }
     //relationship between user and payments
 public function payments(){

     return $this->belongsToMany('App\Model\Users\payment', 'payment_user');
 }

 protected $hidden = [
 'password', 'remember_token',
 ];
 public function is_Admin()
 {
  foreach ($this->roles as $role) {
    if ($role->role=='admin')
    {
      return true;

  }
}
return false;

}
public function is_Client()
{
  foreach ($this->roles as $role) {
    if ($role->role=='client')
    {
      return true;
  }
}
return false;

}
public function is_Writer()
{
  foreach ($this->roles as $role) {
    if ($role->role=='writer')
    {
      return true;
  }
}
return false;

}

public function is_Activated()
{
  if($this->activation=='activated'){
    return true;
  }
return false;

}
}
