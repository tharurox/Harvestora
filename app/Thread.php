<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Thread extends Model
{
    use CommentableTrait;
   
	protected $fillable=['subject','thread','user_id'];	

    //A particular thread belongs to a certain user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'tag_thread');
    }
    
}
