<?php

namespace App\Traits;

use App\User;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }
    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }
    public function toggleFollow(User $user)
    {
        // if($this->isFollowing($user))
        // {
        //     return $this->unFollow($user);
        // }
        return $this->follows()->toggle($user);
    }
    public function follows()
    {
        return $this->belongsToMany('App\User','follows','user_id','following_user_id');
    }

    public function isFollowing($user)
    {
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }
}
