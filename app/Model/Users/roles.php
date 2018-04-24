<?php

namespace App\Model\Users;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
  //relationship between user and roles
  public function users(){
    return $this->belongsToMany('App\User', 'role_user');
  }
}
