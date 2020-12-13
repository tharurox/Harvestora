
<nav class="navbar navbar-expand-lg navbar-success text-dark bg-light">
  <a class="navbar-brand display-1" href="/">Harvestora</a>
  <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars" aria-hidden="true"></i>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @if (Auth::guest())
          <li><a href="{{ route('login') }}" class='btn btn-lg btn-outline-secondary m-2'>Login</a></li>
          <li><a href="{{ route('register') }}" class='btn btn-lg btn-outline-secondary m-2'>Register</a></li>
      @else
  <!-- Notifications -->
 
  <li class="dropdown m-2" id="markasread" onclick="markNotificationAsRead()">
    <a href="#" class=" btn btn-outline-info " data-toggle="dropdown" role="button" aria-expanded="false">
       <span class="fa fa-bell"></span> Notifications <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
    </a>

    <ul class="dropdown-menu " role="menu">
        <li class='dropdown-item'>
@forelse(auth()->user()->unreadNotifications as $notification)
@include('layouts.partials.notification.'.snake_case(class_basename($notification->type)))
@empty
<a href="#">No Unread Notifications</a>
@endforelse
           
        </li>
    </ul>
</li>

  <li class="dropdown">
              <a href="#" class="dropdown-toggle btn btn-outline-secondary btn-lg" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} </span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('user_profile',auth()->user()) }}" class='btn btn-light col-12'>
                        My Profile
                      </a>

                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class='btn btn-light  col-12'>
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
      @endif
  </ul>
  </div>
</nav>





















    

{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="display-1 " href="/">Harvestora</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse justify-content-center row " id="navbarColor02">
     
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/thread">Threads</a>
        </li>
      </ul>
   

   
      <form class="form-inline my-2 my-lg-0 justify-content-end">
        <input class="form-control mr-sm-2 " type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
   
  </nav> --}}
