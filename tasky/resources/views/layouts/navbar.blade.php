@guest
@if (Route::has('login')||Route::has('register'))
<div class="main-panel" style="height: 100vh;overflow: hidden;width: 100%;">
@endif
@else
<div class="main-panel" style="min-height: 100vh;">
@endguest
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">@stack('page-name')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
          @guest
        @if (Route::has('login')||Route::has('register'))

          @endif
        @else
            <form action="{{Route('all-tasks')}}" method="GET">
              <div class="input-group no-border">
                <input type="search" value="" name="search" class="form-control" placeholder="Search task...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
                  <input type="submit" value="Search" class="ml-2 m-0 btn btn-success">
              </div>
            </form>
        @endguest
            <ul class="navbar-nav">
            @guest
@if (Route::has('login')||Route::has('register'))

@endif
@else
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
@endguest
                          @guest
             @if (Route::has('login'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __("Login") }}</a>
</li>
@endif
@if (Route::has('register'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">{{ __("Register") }}</a>
</li>
@endif
<li class="nav-item dropdown">
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    </div>
</li>
               @else
                            <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{-- <i class="nc-icon nc-bell-55"></i> --}}
                    {{ Auth::user()->name }}
                  {{-- <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p> --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __("Logout") }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                   </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
