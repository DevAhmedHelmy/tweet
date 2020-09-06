<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->toggleFollow($user);
        return redirect()->route('user.profile',$user);
    }
}
