<?php

namespace App;


trait LikableTrait
{
    public function likes(){
        return $this->morphMany(Like::class,'likable');
    }


    public function likeIt()
    {
        $like=new Like();
        $like->user_id=auth()->user()->id;

        $this->likes()->save($like);

        return $like;
    }

    public function unlikeIt()
    {
        //$like=Like::find($id);
        $this->likes()->where('user_id',auth()->id())->delete();

       
    }

    public function isLiked()
    {
        return !!$this->likes()->where('user_id',auth()->id())->count();
    }

}