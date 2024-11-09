<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    
   public function index()
   {
        return view('auth.register');
    }


   public function store(Request $request)
   {
    //dd($request);
    //dd($request->get('username'));0

    //Rescribiendo el Slug
    //modificar el request
$request->request->add(['username' =>Str::slug($request->username)]);
//VAlidacion
    $request->validate(
        ['name'=>'required|max:30',
        'username'=>'required|unique:users|min:2',
        'email'=>'required|unique:users|email|max:60',
        'password'=>'required|confirmed|min:4'

    ]);

 User::create([
    'name'=>$request->name,
    'username'=> $request->username,
    'email'=>$request->email,
    'password'=> Hash::make ($request->password)
 ]);
//Autenticart un usuario

Auth::attempt($request->only('email','password'));



//Redirecionar

 return redirect()->route('post.index');
}


}
