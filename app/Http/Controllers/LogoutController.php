<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Container\Attributes\Auth;

class LogoutController extends Controller
{
    //

    public function store(){
         auth()->logout();
       return redirect()->route('login');
    }
}
