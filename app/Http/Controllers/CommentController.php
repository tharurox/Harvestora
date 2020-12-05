<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Thread;
use Illuminate\Http\Request;
use App\Notifications\RepliedToThread;

class CommentController extends Controller
{
    //add comment method

    public function addThreadComment(Request $request, Thread $thread)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
//This code segment is added to CommentableTraight.php
        //add method create object , save method creates arrays
        //$comment = new Comment();
        //$comment->body=$request->body;
        //$comment->user_id=auth()->user()->id;

        //add commentable type and id
        //$thread -> comments()->save($comment);

        $thread->addComment($request->body);
		
		//send notifications
		$thread->user->notify(new RepliedToThread($thread));

        return back()->withMeassage('Comment Created');
    }

    //add reply to a comment
    public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
        
//This code segment is added to CommentableTraight.php
        //add method create object , save method creates arrays
        //$reply = new Comment();
        //$reply->body=$request->body;
        //$reply->user_id=auth()->user()->id;

        //add commentable type and id
        //$comment -> comments()->save($reply);

        $comment->addComment($request->body);

        return back()->withMeassage('Reply Created');
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
