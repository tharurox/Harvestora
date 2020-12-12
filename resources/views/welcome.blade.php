@extends('layouts.front')


@section('banner')
    
<<<<<<< HEAD
<section class="jumbotron  bg-light text-dark">
 
    <div class="container ">
       
      <div class="card text-center">
        
        <div class="card-body">
          <h5 class="card-title display-3">Welcome to Harvestora Community</h5>
          <p class="card-text display-5">An online Agricultural community to Help each other</p>
          @if (Auth::guest())
          <a href="{{ route('register') }}" class="btn btn-primary btn-lg m-1">Join Our community</a>
          @endif
          <a href="{{route('thread.create')}}" class="btn btn-success btn-lg m-1">Start a Thread</a>
        </div>
       
      </div>
=======
<div class="jumbotron">
    <div class="container">
        <h1> Join Harvesotra Community </h1>
        <p> Help and Get Help </p>

        <p>
        <a class="btn btn-primary btn-lg"  href="{{route('home.learnmore')}}"> Learn More.! </a>
>>>>>>> 2c9557ac6dac256afa482da16861c1ed1ff58437
        </p>
    </div>
  </section>
@endsection

@section('heading','Threads')
@section('content')
@include('thread.partials.thread-list')

@endsection