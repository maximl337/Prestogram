<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'title',
        'url',
        'user_id'
    ];

    /**
     * [user description]
     * @return [type] [description]
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * [likes description]
     * @return [type] [description]
     */
    public function like_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'picture_id', 'user_id');
    }

    /**
     * [tags description]
     * @return [type] [description]
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * [comments description]
     * @return [type] [description]
     */
    public function comments()
    {
        return $this->belongsToMany(User::class, 'comments', 'picture_id', 'user_id')->withPivot('body')->withTimestamps();
    }
}
