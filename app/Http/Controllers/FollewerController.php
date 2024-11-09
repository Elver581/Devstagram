<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollewerController extends Controller
{
    public function store(User $user){
    $user->follewers()->attach(auth()->user()->id);
    return back();
    }
    public function destroy(User $user){
        $user->follewers()->detach(auth()->user()->id);
        return back();
        }
}
