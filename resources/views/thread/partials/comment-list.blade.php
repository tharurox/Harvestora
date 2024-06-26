<div class='container comment m-2 p-2'>

    <p><a class='text-info' href='{{route('user_profile',$comment->user->name)}}' > {{$comment->user->name}}&nbsp</a>Commented: </p> 
<p class='text-dark comment-body'>{{$comment->body}}</p>



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
    @can('update',$thread)
<div  class="btn btn-success float-right" onclick="markAsSolution('{{$thread->id}}','{{$comment->id}}',this)">Mark As Solution</div>
    @endcan
    <!-- @endif  
    @endif -->
@endif



<div class="actions">
<div class="container like-box">
<button class="btn btn-default btn-xs" id="{{$comment->id}}-count">Likes ({{$comment->likes()->count()}})</button>
   <span class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Click to like comment" onclick="likeIt('{{$comment->id}}',this)"><span class="fa fa-heart {{$comment->isLiked()?"liked":""}}" aria-hidden="true"></span></span>
</div>
   @if(auth()->check())
   @if(auth()->user()->id ==  $comment->user_id)
    <div class='row d-flex justify-content-end m-1'>
   <form action="{{route('comment.destroy',$comment->id)}}"  method='POST' class="inline-it m-1">

    {{csrf_field()}}
    {{method_field('DELETE')}}
    <input type="submit" class="btn btn-xs btn-outline-danger float-right" value='delete'>


    </form>

    <a class="btn btn-outline-primary " data-toggle ="modal" href="#{{$comment->id}}">Edit</a>
</div>
@endif  
@endif



    

    <div class="modal " id="{{$comment->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="comment-form">
                    <form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <legend>Edit comment</legend>


                           


                            <div class="form-group">
                                <input type="text" class="form-control" name="body" id=""
                                       placeholder="Input..." value="{{$comment->body}}">
                                <input type='hidden' name='_method' value='PUT'>
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

        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

    </script>

@endsection