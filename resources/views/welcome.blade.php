@extends('layouts.front')


@section('banner')
    

    <div class="container">


        <div class="card text-center">
            
            <div class="card-body">
              <p class="card-title display-1">Welcome to Harvestora</p>
              <p class="card-text">Harvestora is a community for agriculture . </p>
              <a class="btn btn-success btn-lg"  href="{{route('thread.create')}}">Ask a Question</a>
              @if (Auth::guest())
              <a class="btn btn-success btn-lg"  href="{{ route('register') }}">Join the Community</a> <br><br>
              @endif
            </div>
          
          </div>

    </div>

@endsection
<div class='row'>
@section('heading','Threads')
</div>
@section('content')
@include('thread.partials.thread-list')

@endsection