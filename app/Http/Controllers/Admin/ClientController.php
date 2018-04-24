<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class ClientController extends Controller
{
    public function getAll()
    {
      $users = Users::where('roles','=','admin')->get();
      return $users;
    }
}
