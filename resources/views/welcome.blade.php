@extends('layouts.front')


@section('banner')
    
<div class="jumbotron">
    <div class="container">
        <h1> Join Harvesotra Community </h1>
        <p> Help and Get Help </p>

        <p>
            <a class="btn btn-primary btn-lg"> Learn More </a>
        </p>
    </div>
</div>
@endsection

@section('heading','Threads')
@section('content')
@include('thread.partials.thread-list')

@endsection