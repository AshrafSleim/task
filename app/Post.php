<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id','image',
    ];

    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }
    function comments()
    {
        return $this->hasMany('App\comment');
    }
    function tags()
    {
        return $this->hasMany('App\tag');
    }
}
