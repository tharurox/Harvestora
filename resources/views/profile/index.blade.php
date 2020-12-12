@extends('layouts.front')

@section('category')
    <div class="col-md-3" >
    <div class="dp">
    <img src="https://dummyimage.com/300x200/000/fff" alt="">
    </div>
        <h3>
            {{$user->name}}
        </h3>

    </div>

@endsection

@section('content')
<div>
    

    <h5> Name : {{$user->name}} </h5>
    <h5> Email : {{$user->email}} </h5>
    <br>
    <hr>

</div>

@endsection