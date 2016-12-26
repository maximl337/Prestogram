<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * [tags description]
     * @return [type] [description]
     */
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    /**
     * [pictures description]
     * @return [type] [description]
     */
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * [liked_pictures description]
     * @return [type] [description]
     */
    public function liked_pictures()
    {
        return $this->belongsToMany(Picture::class, 'likes', 'user_id', 'picture_id');
    }
}
