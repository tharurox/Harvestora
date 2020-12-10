@extends('layouts.front')
@section('content')
<div class="container m-3">

    <h4 class='display-4 text-info'>{{$thread->subject}}</h4>
    <hr>

    <div class="thread-details display-5">

        {!!  \Michelf\Markdown::defaultTransform($thread->thread)    !!}

    </div>
    <br>

<!-- @if(auth()->user()->id == $thread->user_id) -->
    @can('update',$thread)
    <div class="actions row justify-content-end">
        
    <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info m-2">Edit</a>

    <form action="{{route('thread.destroy',$thread->id)}}"  method='POST' class="inline-it">
    
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input type="submit" class="btn btn-xs btn-danger m-2" value='delete'>
    
    
    </form>
    </div>
    @endcan
<!-- @endif -->
</div>
<hr>
    <br>

<!--Answers / comments here !-->

<div class="comment-form card p p-2 my-2 bg-light ">

    <form action="{{route('threadcomment.store',$thread->id)}}"  method="post" role="form">
    {{csrf_field()}}
    
        <div class="form-group">
            <textarea type="text" class="form-control" name="body" id ="" placeholder="create comment to the thread"></textarea>
        </div>
        <button type="submit" class="btn btn-secondary btn-sm float-right">Comment</button>
    </form>
</div>

    <div class="comment-list container">
        @foreach($thread->comments as $comment)

        @include('thread.partials.comment-list')
            <hr>
         
           {{--reply to comment --}} 
           <button class="btn btn-xs btn-default" onclick="toggleReply('{{$comment->id}}')">Reply</button>
           <br>
           {{--Reply Form--}} 

<div style="margin-left: 50px" class="reply-form-{{$comment->id}} hidden">

    <form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
    {{csrf_field()}}
     

        <div class="form-group row">
            <input type="text" class="form-control m-2" name="body" id ="" placeholder="Reply to this comment...">

            <button type="submit" class="btn btn-primary m-2">Reply</button>
        </div>


       
    </form>
</div>
<br>

           @foreach ($comment->comments as $reply)

           <div class="container" style="margin-left: 40px">
               <h5 class='text-dark display-5'>{{$reply->body}}</h5>
             <div class='row'> <p>By </p> <p class='text-muted mx-1'> {{$reply->user->name}}</p></div>

               <div class="actions">
                <button  data-toggle="modal" data-target="#{{$reply->id}}">edit reply</button>
                <div class="modal fade" id="{{$reply->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <div class="comment-form">
                                    <form action="{{route('comment.update',$reply->id)}}" method="post" role="form">
                                        {{csrf_field()}} {{method_field('put')}}
                                        <legend>Edit Reply</legend>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="body" id="" placeholder="input" value="{{$reply->body}}" />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Reply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

           </div>

            

           @endforeach


        @endforeach
        <br><br>
    </div>
    
@endsection

@section('js')

    <script>
        function toggleReply(commentId){
            $('.reply-form-'+commentId).toggleClass('hidden');
        }

    </script>

@endsection  
