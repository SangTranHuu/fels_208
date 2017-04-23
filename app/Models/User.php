<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('current_lesson_id')->withTimestamps();
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function scopeIsUser($query)
    {
        return $query->where('is_admin', '=', 0);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function setAvatarAttribute($avatar)
    {
        $filename = $avatar->getClientOriginalName();
        $avatar->move(config('custom.url.avatar'), $filename);
        if (File::exists(config('custom.url.avatar') . $this->avatar)) {
            File::delete(config('custom.url.avatar') . $this->avatar);
        }

        $this->attributes['avatar'] = $filename;
    }
}
