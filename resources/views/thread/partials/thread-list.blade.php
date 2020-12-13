<div class="list-group mt-4 thread">
    @forelse($threads as $thread)

    <div class="card text-center m-2">
        <div class="card-header d-flex justify-content-start bg-light">
            <h3 class="card-title "><a class='text-dark' href="{{route('thread.show',$thread->id)}}"> {{$thread->subject}}</a></h3>
          </div>
        <div class="card-body">
         
          <p class="card-text">{{str_limit($thread->thread,100) }}</p>
         
        </div>
        <div class="card-footer text-muted bg-white">
            Posted by <a href="{{route('user_profile',$thread->user->name)}}">{{$thread->user->name}}</a> {{$thread->created_at->diffForHumans()}}
        </div>
      </div>


    @empty
        <h5>No Threads</h5>

    @endforelse
</div>