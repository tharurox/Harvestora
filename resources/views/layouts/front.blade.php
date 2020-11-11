<!DOCTYPE HTML>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Harvestora Forum </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css" integrity="sha384-nNK9n28pDUDDgIiIqZ/MiyO3F4/9vsMtReZK39klb/MtkZI3/LtjSjlmyVPS3KdN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">


    

 </head>
<body>

    @include('layouts.partials.navbar')

    @yield('banner')

<div class ="container">

    <div class="row">

    <div class="row content-heading">

    <div class="col-md-3"><h4>Catogory</h4></div>

    <div class="col-md-9">

        <div class="row">

            <div class="col-md-4"><h4 class="main-content-heading">@yield('heading')</h4></div>

            <div class="col-md-offset-6 col-md-2">
               <a  class="btn btn-primary" href='{{route('thread.create')}}'> Create thread </a>
                     </div>
                 </div>
              </div>


        </div>
    </div>


    <div class="row">

        {{--//catogory section--}}
  <div class="col-md-3">

    <ul class="list-group">

        <a href="{{route('thread.index')}}" class="list-group-item">
        
        <span class="badge">14</span>
        All thread
        </a>

        <a href="" class="list-group-item">

            <span class="badge">2</span>
           PHP
        </a>
    </ul>
  </div>
  <div class="col-md-9 well">
    @yield('content')
</div>
    </div>
  
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
</script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
</body>
</html>


