<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show',[
            'user' => $user,
            'tweets' => $user->tweets()->paginate(20)
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit',['user' => $user]);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        if(isset($data['avatar']))
        {
            $data['avatar'] = $data['avatar']->store('avatars');
        }
        $user->update($data);
        return redirect($user->path())->with('message', 'Saved');

    }
}
