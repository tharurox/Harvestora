<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use CommentableTrait;
   // protected $guarded = [];
	protected $fillable=['subject','user_id','thread'];	

    //A particular thread belongs to a certain user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//  tags belong to a particular users post
    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }
    
    
}
