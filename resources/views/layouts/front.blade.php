<!DOCTYPE HTML>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name='csrf-token' content="{{csrf_token()}}">
    <title> Harvestora Forum </title>
  

    {{-- styles --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
    <script>

      window.laravel = {
        !! json_encode([

          'csrfToken' => csrf_token(),
        ])!!
      };
    </script>
    
    
    
 </head>
<body >
<div  id='app'>
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
      <div class="content-wrap" >
    @yield('content')
      </div>
    </div>
    </div>
  
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css"> </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.0/css/selectize.bootstrap4.css" integrity="sha512-wu84CEhfBSCIcQdVMnRfgdxzAvmk8wWrtg3JXIV6kp+ktoQu3lDJuWXtoTnsAZioCvNXiZvrO/tWicnQX9xptA==" crossorigin="anonymous" />


@yield('js')
</div>
</body>
</html>


