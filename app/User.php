<?php

namespace App;

use App\Traits\Followable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset($value ? \Storage::url($value) : '/images/avatar.jpg');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function tweets()
    {
        return $this->hasMany('App\Tweet')->latest();
    }

    public function timeline()
    {
        $friends = $this->follows->pluck('id');
        return Tweet::whereIn('user_id',$friends)
                ->orWhere('user_id',$this->id)
                ->withLikes()
                ->latest()
                ->paginate(20);

    }

    public function path($append = '')
    {
        $path = url('profiles/'.$this->username);

        return ($append) ? "{$path}/{$append}" : $path;
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }



}
