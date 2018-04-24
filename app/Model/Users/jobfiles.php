<?php

namespace App\Model\Users;

use Illuminate\Database\Eloquent\Model;

class jobfiles extends Model
{
    public function jobs(){
      return $this->belongsTo('App\Model\Users\jobs');
    }
}
