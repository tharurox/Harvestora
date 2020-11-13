<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    //A particular thread belongs to a certain user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //comment to a certain thread 
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
}
