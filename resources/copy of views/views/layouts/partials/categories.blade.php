<div class="col-md-3 ">
    @if (!\Request::is('thread/create'))  
    <a class="btn btn-info btn-lg mt-4"  href="{{route('thread.create')}}">Create Thread</a>
@endif
     <br><br>
    

    <ul class="list-group">
        <h4>Tags</h4>
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