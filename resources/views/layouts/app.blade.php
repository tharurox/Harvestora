<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.0/css/selectize.bootstrap4.css" integrity="sha512-wu84CEhfBSCIcQdVMnRfgdxzAvmk8wWrtg3JXIV6kp+ktoQu3lDJuWXtoTnsAZioCvNXiZvrO/tWicnQX9xptA==" crossorigin="anonymous" />

 
    
</head>
<body>

    <div id="app d-flex justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-success text-dark bg-light">
           
                

            <a class="navbar-brand display-1"  href="{{ url('/') }}">Harvestora</a>
                   
                

                
               
        </nav>
<div class="container justify-content-center">

    @yield('content')
</div>
      
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css"> </script>

 


</body>
</html>
