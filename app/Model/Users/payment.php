<?php

namespace App\Model\Users;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
  //relationship between payments and jobs
  public function jobs(){

    return $this->belongsTo('App\Model\Users\jobs', 'job_payment')->withTimeStamps();
  }
    //relationship between payments and users
  public function users(){

    return $this->belongsTo('App\Users', 'payment_user')->withTimeStamps();
  }
}
