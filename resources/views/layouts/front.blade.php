<!DOCTYPE HTML>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Harvestora Forum </title>
   
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  

    
    
    
    
 </head>
<body>

    @include('layouts.partials.navbar')

    @yield('banner')

<div class ="container">
@include('layouts.partials.error')
@include('layouts.partials.success')

    <div class="row">

        @section('category')
            {{--//catogory section--}}
            @include('layouts.partials.categories')
        @show
  
        <div class="col-md-9 well">
      <div class="row content-heading"><h4>@yield('heading')</h4></div>
      <div class="content-wrap">
    @yield('content')
      </div>
    </div>
    </div>
  
</div>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

@yield('js')
</body>
</html>


