<div class='container'>
<h5>{{$comment->body}}</h5>



@if(!empty($thread->solution))
   
    @if($thread->solution == $comment->id)
    <button class="btn btn-success float-right"> Solution</button>
    @endif

@else
    <!-- @if(auth()->check())
        @if(auth()->user()->id == $thread->user_id)
    {{-- <form action="{{route('markAsSolution')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="threadId" value="{{$thread->id}}">
        <input type="hidden" name="solutionId" value="{{$comment->id}}">
        <input type="submit" class="btn btn-success pull-right" id="{{$comment->id}}" value="Mark As Solution">
    </form> --}} -->
    @can('update',$thread);
<div  class="btn btn-success float-right" onclick="markAsSolution('{{$thread->id}}','{{$comment->id}}',this)">Mark As Solution</div>
    @endcan
    <!-- @endif  
    @endif -->
@endif



<lead>{{$comment->user->name}}</lead>

<div class="actions">

<button class="btn btn-default btn-xs" id="{{$comment->id}}-count">{{$comment->likes()->count()}}</button>
   <span class="btn btn-default btn-xs" onclick="likeIt('{{$comment->id}}',this)"><span class="fa fa-heart {{$comment->isLiked()?"liked":""}}" aria-hidden="true"></span></span>


<div class='row'>
   <form action="{{route('comment.destroy',$comment->id)}}"  method='POST' class="inline-it m-1">

    {{csrf_field()}}
    {{method_field('DELETE')}}
    <input type="submit" class="btn btn-xs btn-danger float-right" value='delete'>


    </form>
   <a class="btn btn-primary btn-xs float right m-1" data-="modal" href="#{{$comment->id}}">edit</a>

</div>

    
  
    <div class="modal fade" id="{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$comment->id}}" aria-hidden="true">
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
            </div>
        </div>
    </div>
<!--  <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Edit</a>  !-->

  
</div>

</div>

@section('js')
    <script>
       function markAsSolution(threadId, solutionId,elem) {
            var csrfToken='{{csrf_token()}}';
            $.post('{{route('markAsSolution')}}', {solutionId: solutionId, threadId: threadId,_token:csrfToken}, function (data) {
                    $(elem).text('solution');
            });
        }
       
        function likeIt(commentId,elem){
            var csrfToken='{{csrf_token()}}';
            var likesCount=parseInt($('#'+commentId+"-count").text());
            $.post('{{route('toggleLike')}}', {commentId: commentId, _token:csrfToken}, function (data) {
                   console.log(data);
                   if(data.message==='liked'){
                        $(elem).addClass('liked');
                        $('#'+commentId+"-count").text(likesCount+1);
               }else{
                        $('#'+commentId+"-count").text(likesCount-1);
                        $(elem).removeClass('liked');
                   
               }
            });
        }

        

    </script>

@endsection