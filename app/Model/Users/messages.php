<?php

namespace App\Model\Users;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    //relationship between messages and jobs
  public function jobs(){

    return $this->belongsTo('App\Model\Users\jobs', 'job_message');
  }
    //relationship between messages and users
  public function users(){

    return $this->belongsTo('App\User', 'message_user');
  }
}
