<?php

namespace App\Model\Users;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    //relationship between jobs and messages
  public function messages(){

    return $this->belongsToMany('App\Model\Users\messages', 'job_message');
  }
    //relationship between jobs and users
  public function users(){

    return $this->belongsTo('App\User', 'client');
  }

  public function writers(){

    return $this->belongsTo('App\User', 'writer');
  }

    //relationship between jobs and payments
  public function payments(){

    return $this->hasOne('App\Model\Users\payment', 'job_payment');
  }
  public function files(){

    return $this->hasMany('App\Model\Users\jobfiles');
  }
  //query the various elements
  public function scopeQueryD($query,$status,$id)
  {
    return $query->where('status',$status)->where('writer',$id)->get();
  }
  public function scopeQueryW($query,$status,$id)
  {
    return $query->where('status',$status)->where('client',$id)->get();
  }
}
