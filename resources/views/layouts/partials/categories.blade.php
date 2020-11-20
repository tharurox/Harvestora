<div class="col-md-3">

    <h4>Tags</h4>

    <ul class="list-group">
    
            <a href="{{route('thread.index')}}" class="list-group-item">
                <span class="badge">14</span>
                All Threads
            </a>


            @foreach($tags as $tag)
            <a href="{{route('thread.index',['tags'=>$tag->id])}}" class="list-group-item">
                <span class="badge">14</span>
               
                {{$tag->name}}
            </a>
        @endforeach
    </ul>
  </div>