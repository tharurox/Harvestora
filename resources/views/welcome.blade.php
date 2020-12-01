@extends('layouts.front')


@section('banner')
    
<div class="jumbotron bg-dark text-light">
    <div class="container">
       
      <div class=" text-center">
        
        <div class="card-body">
          <h5 class="card-title display-3">Welcome to Harvestora Community</h5>
          <p class="card-text display-5">An online Agricultural community to Help each other</p>
          @if (Auth::guest())
          <a href="{{ route('register') }}" class="btn btn-primary btn-lg m-1">Join Our community</a>
          @endif
          <a href="{{route('thread.create')}}" class="btn btn-success btn-lg m-1">Start a Thread</a>
        </div>
       
      </div>
        </p>
    </div>
</div>
@endsection

@section('heading','Threads')
@section('content')
@include('thread.partials.thread-list')

@endsection