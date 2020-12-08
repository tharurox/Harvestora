<div class="col-md-3">

    <a class="btn btn-primary"  href="{{route('thread.create')}}">Create Thread</a> <br><br>
    <h4>Tags</h4>

    <ul class="list-group">

        <a href="{{route('thread.index')}}" class="list-group-item">
            <span class="badge">14</span>
            All Threads
            </a>

        @foreach ($tags as $tag)
        <a href="{{route('thread.index',['tags'=>$tag->id])}}" class="list-group-item">
            <span class="badge">14</span>
            {{$tag-> name}}
            </a>
        @endforeach
        
    </ul>
  </div>