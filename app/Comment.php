<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillablel=['body','user_id'];
    //return all of the commentable models
    public function commentable(){

        return $this->morphTo();
    }

    //A particular thread belongs to a certain user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
