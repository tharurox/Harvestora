
<nav class="navbar navbar-expand-lg navbar-light text-dark">
  <a class="navbar-brand display-1" href="/">Harvestora</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @if (Auth::guest())
          <li><a href="{{ route('login') }}" class='btn btn-lg btn-outline-secondary m-2'>Login</a></li>
          <li><a href="{{ route('register') }}" class='btn btn-lg btn-outline-secondary m-2'>Register</a></li>
      @else
  <!-- Notifications -->
  <notification :userid="{{auth()->id()}}" :unreads='{{auth()-> user()->unreadNotifications}}'> </notification>
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
