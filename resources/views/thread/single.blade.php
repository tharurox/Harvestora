@extends('layouts.front')


@section('content')


    <h4>{{$thread->subject}}</h4>
    <hr>

    <div class="thread-details">

        {!!  \Michelf\Markdown::defaultTransform($thread->thread)    !!}

    </div>
    <br>

@if(auth()->user()->id == $thread->user_id)
    <div class="actions">
        
    <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>

    <form action="{{route('thread.destroy',$thread->id)}}"  method='POST' class="inline-it">
    
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <input type="submit" class="btn btn-xs btn-danger" value='delete'>
    
    
    </form>
    </div>
@endif


<!--Answers / comments here !-->

    <div class="comment-list">
        @foreach($thread->comments as $comment)

            <h4>{{$comment->body}}</h4>
            <lead>{{$comment->user->name}}</lead>

            <div class="actions">
                <a class="btn btn-primary btn-xs" data- ="modal" href="#{{$comment->id}}">edit</a>
                <div class="modal fade" id="{{$comment->id}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <div class="comment-form">
                                    <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                                        {{csrf_field()}} {{method_field('put')}}
                                        <legend>Edit comment</legend>

                                        <div class="form-group">
                                            <input type="text" class="form-control" name="body" id="" placeholder="input" value="{{$comment->body}}" />
                                        </div>

                                        <button type="submit" class="btn btn-primary">Comment</button>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
          <!--  <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>  !-->
          
                <form action="{{route('comment.destroy',$comment->id)}}"  method='POST' class="inline-it">
        
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-xs btn-danger" value='delete'>
            
        
                </form>
            </div>


        @endforeach
    </div>
    <div class="comment-form">

        <form action="{{route('threadcomment.store',$thread->id)}}" method="post" role="form">
        {{csrf_field()}}
            <legend> Create comment </legend>

            <div class="form-group">
                <input type="text" class="form-control" name="body" id ="" placeholder="input">
            </div>


            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
    </div>
@endsection