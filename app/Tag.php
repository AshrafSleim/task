<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
    'post_id', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\user','user_id');
    }
}
