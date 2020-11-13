<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    //add comment method

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
        //add method create object , save method creates arrays
        $comment = new Comment();
        $comment->body=$request->body;
        $comment->user_id=auth()->user()->id;

        //add commentable type and id
        $thread -> comments()->save($comment);

        return back()->withMeassage('Comment Created');
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            abort('401');

        $this->validate($request,[
            'body'=>'required'
        ]);

        $comment->update($request->all());

        return back()->withMessage('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {       
        if($comment->user_id !== auth()->user()->id)
            abort('401');

        $comment->delete();
        return back()->withMessage('Deleted');
    }
}
