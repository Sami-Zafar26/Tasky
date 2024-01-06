<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/75daafee80.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    {{-- <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @stack('title')
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <button class="menu-icon-button" data-menu-icon-button>
                <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 95.95"
                    style="enable-background:new 0 0 122.88 95.95" xml:space="preserve">
                    <style type="text/css">
                    .st0 {
                        fill-rule: evenodd;
                        clip-rule: evenodd;
                    }
                    </style>
                    <g>
                        <path class="st0"
                            d="M8.94,0h105c4.92,0,8.94,4.02,8.94,8.94l0,0c0,4.92-4.02,8.94-8.94,8.94h-105C4.02,17.88,0,13.86,0,8.94l0,0 C0,4.02,4.02,0,8.94,0L8.94,0z M8.94,78.07h105c4.92,0,8.94,4.02,8.94,8.94l0,0c0,4.92-4.02,8.94-8.94,8.94h-105 C4.02,95.95,0,91.93,0,87.01l0,0C0,82.09,4.02,78.07,8.94,78.07L8.94,78.07z M8.94,39.03h105c4.92,0,8.94,4.02,8.94,8.94l0,0 c0,4.92-4.02,8.94-8.94,8.94h-105C4.02,56.91,0,52.89,0,47.97l0,0C0,43.06,4.02,39.03,8.94,39.03L8.94,39.03z" />
                    </g>
                </svg>
            </button>
            <a href="/" class="text-dark text-decoration-none mx-3"><h5 class="mb-0">Tasky</h5></a>

            <ul class="navbar-nav">
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
    </header>
    {{-- @extends('layouts.app') --}}

    {{-- @section('content') --}}

    {{-- @if (session('task-uploaded'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Attention!</strong> {{session('task-uploaded')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif --}}
    <div class="containers">
        <aside class="sidebar open" data-sidebar>
            <div class="sidebar-top">
                <a href="#" class="user-logo"><img src="{{asset('images/profile-user.png')}}" alt="User Picture"></a>
                <div class="hidden-sidebar username">{{auth()->user()->name}}</div>
            </div>
            <div class="sidebar-middle">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item">
                        <a href="{{Route('admin')}}" class="sidebar-link" title="Profile">
                        <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.88 112.07" style="enable-background:new 0 0 122.88 112.07" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M61.44,0L0,60.18l14.99,7.87L61.04,19.7l46.85,48.36l14.99-7.87L61.44,0L61.44,0z M18.26,69.63L18.26,69.63 L61.5,26.38l43.11,43.25h0v0v42.43H73.12V82.09H49.49v29.97H18.26V69.63L18.26,69.63L18.26,69.63z"/></g></svg>
                            <div class="hidden-sidebar">Home</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="{{'/add-task'}}" class="sidebar-link" title="Profile">
                            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 419 511.67"><path d="M314.98 303.62c57.47 0 104.02 46.59 104.02 104.03 0 57.47-46.58 104.02-104.02 104.02-57.47 0-104.02-46.58-104.02-104.02 0-57.47 46.58-104.03 104.02-104.03zM41.73 59.27h23.93v24.38H41.73c-4.54 0-8.7 1.76-11.8 4.61l-.45.49c-3.14 3.13-5.1 7.48-5.1 12.24v315.53c0 4.75 1.96 9.1 5.1 12.24 3.13 3.15 7.48 5.11 12.25 5.11h142.62c1.68 8.44 4.17 16.6 7.36 24.38H41.73c-11.41 0-21.86-4.71-29.42-12.26C4.72 438.44 0 427.99 0 416.52V100.99c0-11.48 4.7-21.92 12.25-29.47l.79-.72c7.5-7.13 17.62-11.53 28.69-11.53zm297.55 217.37V100.99c0-4.74-1.96-9.09-5.12-12.24-3.11-3.15-7.47-5.1-12.24-5.1h-23.91V59.27h23.91c11.45 0 21.86 4.72 29.42 12.26 7.61 7.56 12.32 18.02 12.32 29.46V283.6c-7.79-3.06-15.95-5.41-24.38-6.96zm-206.75-8.07c-7.13 0-12.92-5.79-12.92-12.92s5.79-12.93 12.92-12.93h142.83c7.13 0 12.92 5.8 12.92 12.93s-5.79 12.92-12.92 12.92H132.53zM89.5 241.22c7.98 0 14.44 6.46 14.44 14.44 0 7.97-6.46 14.43-14.44 14.43-7.97 0-14.44-6.46-14.44-14.43 0-7.98 6.47-14.44 14.44-14.44zm0 78.62c7.98 0 14.44 6.46 14.44 14.44 0 7.97-6.46 14.43-14.44 14.43-7.97 0-14.44-6.46-14.44-14.43 0-7.98 6.47-14.44 14.44-14.44zm43.04 27.35c-7.13 0-12.93-5.79-12.93-12.92s5.8-12.93 12.93-12.93h80.96a133.608 133.608 0 0 0-17.26 25.85h-63.7zM89.5 162.6c7.98 0 14.44 6.46 14.44 14.44 0 7.98-6.46 14.44-14.44 14.44-7.97 0-14.44-6.46-14.44-14.44 0-7.98 6.47-14.44 14.44-14.44zm43.03 27.37c-7.13 0-12.92-5.8-12.92-12.93s5.79-12.92 12.92-12.92h142.83c7.13 0 12.92 5.79 12.92 12.92s-5.79 12.93-12.92 12.93H132.53zM93 39.4h46.13C141.84 17.18 159.77 0 181.52 0c21.62 0 39.45 16.95 42.34 38.94l46.76.46c2.61 0 4.7 2.09 4.7 4.71v51.84c0 2.6-2.09 4.7-4.7 4.7H93.05c-2.56 0-4.71-2.1-4.71-4.7V44.11A4.638 4.638 0 0 1 93 39.4zm88.03-19.25c12.3 0 22.26 9.98 22.26 22.27 0 12.3-9.96 22.26-22.26 22.26-12.29 0-22.26-9.96-22.26-22.26 0-12.29 9.97-22.27 22.26-22.27zm118.39 346.9c-.04-4.59-.46-7.86 5.23-7.79l18.45.23c5.95-.04 7.53 1.86 7.46 7.43v25.16h25.02c4.59-.03 7.86-.46 7.78 5.24l-.22 18.44c.03 5.96-1.86 7.54-7.43 7.48h-25.15v25.14c.07 5.57-1.51 7.46-7.46 7.43l-18.45.22c-5.69.09-5.27-3.2-5.23-7.79v-25h-25.16c-5.59.06-7.47-1.52-7.44-7.48l-.22-18.44c-.09-5.7 3.2-5.27 7.79-5.24h25.03v-25.03z"/></svg>
                            <div class="hidden-sidebar">Add Task</div>
                        </a>
                    </li>
                    {{-- <li class="sidebar-list-item">
                        <a href="/" class="sidebar-link" title="Profile">
                            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
                                width="122.88px" height="80.123px" viewBox="0 0 122.88 80.123"
                                enable-background="new 0 0 122.88 80.123" xml:space="preserve">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.297,0h114.285c2.365,0,4.298,1.948,4.298,4.329v75.794H0V4.329 C0,1.948,1.932,0,4.297,0L4.297,0z M11.37,10.073h82.644v12.046H11.37V10.073L11.37,10.073z M83.428,47.727h28.082v6.672H83.428 V47.727L83.428,47.727z M61.978,47.727h15.718v6.672H61.978V47.727L61.978,47.727z M61.978,62.756h49.532v6.67H61.978V62.756 L61.978,62.756z M60.803,32.701h50.707v6.671H60.803V32.701L60.803,32.701z M11.37,70.051v-6.84 c3.66-1.629,14.865-4.648,15.396-9.131c0.118-1.012-2.268-4.943-2.814-6.791c-0.687-1.098-1.057-1.488-1.039-2.84 c0.009-0.762,0.021-1.51,0.129-2.242c0.141-0.934,0.111-0.965,0.601-1.717c0.51-0.782,0.291-3.64,0.291-4.717 c0-10.727,18.795-10.729,18.795,0c0,1.356-0.311,3.848,0.426,4.914c0.358,0.52,0.292,0.58,0.413,1.215 c0.159,0.83,0.17,1.682,0.184,2.547c0.018,1.352-0.352,1.742-1.039,2.84c-0.667,1.943-3.2,5.615-2.984,6.715 c0.805,4.092,11.2,6.842,14.473,8.297v7.75H11.37L11.37,70.051z M99.08,10.073h12.43v12.046H99.08V10.073L99.08,10.073z" />
                                </g>
                            </svg>
                            <div class="hidden-sidebar">Users</div>
                        </a>
                    </li> --}}
                    <li class="sidebar-list-item">
                        <a href="{{'/tasks'}}" class="sidebar-link">
                            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 106.86 122.88" style="enable-background:new 0 0 106.86 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M39.62,64.58c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89c1.46,0,2.64,1.41,2.64,3.14 c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,64.58z M46.77,116.58c1.74,0,3.15,1.41,3.15,3.15c0,1.74-1.41,3.15-3.15,3.15H7.33 c-2.02,0-3.85-0.82-5.18-2.15C0.82,119.4,0,117.57,0,115.55V7.33c0-2.02,0.82-3.85,2.15-5.18C3.48,0.82,5.31,0,7.33,0h90.02 c2.02,0,3.85,0.83,5.18,2.15c1.33,1.33,2.15,3.16,2.15,5.18v50.14c0,1.74-1.41,3.15-3.15,3.15c-1.74,0-3.15-1.41-3.15-3.15V7.33 c0-0.28-0.12-0.54-0.31-0.72c-0.19-0.19-0.44-0.31-0.72-0.31H7.33c-0.28,0-0.54,0.12-0.73,0.3C6.42,6.8,6.3,7.05,6.3,7.33v108.21 c0,0.28,0.12,0.54,0.3,0.72c0.19,0.19,0.45,0.31,0.73,0.31H46.77L46.77,116.58z M98.7,74.34c-0.51-0.49-1.1-0.72-1.78-0.71 c-0.68,0.01-1.26,0.27-1.74,0.78l-3.91,4.07l10.97,10.59l3.95-4.11c0.47-0.48,0.67-1.1,0.66-1.78c-0.01-0.67-0.25-1.28-0.73-1.74 L98.7,74.34L98.7,74.34z M78.21,114.01c-1.45,0.46-2.89,0.94-4.33,1.41c-1.45,0.48-2.89,0.97-4.33,1.45 c-3.41,1.12-5.32,1.74-5.72,1.85c-0.39,0.12-0.16-1.48,0.7-4.81l2.71-10.45l0,0l20.55-21.38l10.96,10.55L78.21,114.01L78.21,114.01 z M39.62,86.95c-1.46,0-2.65-1.43-2.65-3.19c0-1.76,1.19-3.19,2.65-3.19h17.19c1.46,0,2.65,1.43,2.65,3.19 c0,1.76-1.19,3.19-2.65,3.19H39.62L39.62,86.95z M39.62,42.26c-1.46,0-2.64-1.41-2.64-3.14c0-1.74,1.18-3.14,2.64-3.14h34.89 c1.46,0,2.64,1.41,2.64,3.14c0,1.74-1.18,3.14-2.64,3.14H39.62L39.62,42.26z M24.48,79.46c2.06,0,3.72,1.67,3.72,3.72 c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,81.13,22.43,79.46,24.48,79.46L24.48,79.46z M24.48,57.44 c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72C20.76,59.11,22.43,57.44,24.48,57.44 L24.48,57.44z M24.48,35.42c2.06,0,3.72,1.67,3.72,3.72c0,2.06-1.67,3.72-3.72,3.72c-2.06,0-3.72-1.67-3.72-3.72 C20.76,37.08,22.43,35.42,24.48,35.42L24.48,35.42z"/></g></svg>
                            <div class="hidden-sidebar">Tasks</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="{{Route('review')}}" class="sidebar-link">
                            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 110.66 122.88"><title>indexing-pages</title><path d="M81.81,70.82a22.72,22.72,0,0,1,19,35.15l9.83,10.71-6.78,6.2L94.4,112.45A22.72,22.72,0,1,1,81.81,70.82ZM72.38,96.06a2.59,2.59,0,0,1-.32-.42,2.34,2.34,0,0,1-.25-.47,3,3,0,0,1,4.34-3.75,2,2,0,0,1,.47.35h0c.83.79,1.09,1,2,1.77l.79.71,7.37-7.85c2.73-2.8,7.08,1.31,4.36,4.18l-9,9.53-.4.42a3,3,0,0,1-4.21.19l0,0c-.2-.19-.41-.39-.63-.58L75.4,98.79c-1.2-1-1.89-1.61-3-2.73ZM19.78,65.28a2.8,2.8,0,0,1-2.64-2.89,2.74,2.74,0,0,1,2.64-2.89H42.42a2.8,2.8,0,0,1,2.65,2.89,2.76,2.76,0,0,1-2.65,2.89Zm65.1-47.7h9.5a6.66,6.66,0,0,1,4.78,2,6.73,6.73,0,0,1,2,4.78v37c-.21,2.12-5.41,2.15-5.85,0v-37a.94.94,0,0,0-1-1H84.85v38c-.51,1.93-4.84,2.21-5.82,0V6.78a1,1,0,0,0-.27-.69,1,1,0,0,0-.69-.27H6.74a1,1,0,0,0-.68.27.93.93,0,0,0-.28.69V87.36a.94.94,0,0,0,1,1H49.27c2.93.3,3,5.37,0,5.82H22.05v10.8a1,1,0,0,0,.28.69,1,1,0,0,0,.69.27H49.27c2.13.24,2.81,5.07,0,5.82H23.05a6.66,6.66,0,0,1-4.78-2,6.73,6.73,0,0,1-2-4.78V94.14H6.78a6.66,6.66,0,0,1-4.78-2,6.73,6.73,0,0,1-2-4.78V6.78A6.66,6.66,0,0,1,2,2,6.71,6.71,0,0,1,6.78,0H78.1a6.7,6.7,0,0,1,4.79,2,6.74,6.74,0,0,1,2,4.78v10.8ZM19.75,28.78a2.8,2.8,0,0,1-2.65-2.89A2.75,2.75,0,0,1,19.75,23H65a2.8,2.8,0,0,1,2.65,2.89A2.76,2.76,0,0,1,65,28.78Zm0,18.25a2.8,2.8,0,0,1-2.65-2.89,2.75,2.75,0,0,1,2.65-2.89H65a2.8,2.8,0,0,1,2.65,2.89A2.76,2.76,0,0,1,65,47ZM93.89,81.46a17.06,17.06,0,1,0,5,12.07,17,17,0,0,0-5-12.07Z"/></svg>
                            <div class="hidden-sidebar">Review</div>
                        </a>
                    </li>
                    {{-- <li class="sidebar-list-item">
                        <a href="#" class="sidebar-link">
                            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
                                width="109.484px" height="122.88px" viewBox="0 0 109.484 122.88"
                                enable-background="new 0 0 109.484 122.88" xml:space="preserve">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.347,9.633h38.297V3.76c0-2.068,1.689-3.76,3.76-3.76h21.144 c2.07,0,3.76,1.691,3.76,3.76v5.874h37.83c1.293,0,2.347,1.057,2.347,2.349v11.514H0V11.982C0,10.69,1.055,9.633,2.347,9.633 L2.347,9.633z M8.69,29.605h92.921c1.937,0,3.696,1.599,3.521,3.524l-7.864,86.229c-0.174,1.926-1.59,3.521-3.523,3.521h-77.3 c-1.934,0-3.352-1.592-3.524-3.521L5.166,33.129C4.994,31.197,6.751,29.605,8.69,29.605L8.69,29.605z M69.077,42.998h9.866v65.314 h-9.866V42.998L69.077,42.998z M30.072,42.998h9.867v65.314h-9.867V42.998L30.072,42.998z M49.572,42.998h9.869v65.314h-9.869 V42.998L49.572,42.998z" />
                                </g>
                            </svg>
                            <div class="hidden-sidebar">Trash</div>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <div class="sidebar-bottom">
                <ul class="sidebar-list">
                    <li class="sidebar-list-item">
                        <a href="#" class="sidebar-link">
                            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
                                width="122.88px" height="122.878px" viewBox="0 0 122.88 122.878"
                                enable-background="new 0 0 122.88 122.878" xml:space="preserve">
                                <g>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M101.589,14.7l8.818,8.819c2.321,2.321,2.321,6.118,0,8.439l-7.101,7.101 c1.959,3.658,3.454,7.601,4.405,11.752h9.199c3.283,0,5.969,2.686,5.969,5.968V69.25c0,3.283-2.686,5.969-5.969,5.969h-10.039 c-1.231,4.063-2.992,7.896-5.204,11.418l6.512,6.51c2.321,2.323,2.321,6.12,0,8.44l-8.818,8.819c-2.321,2.32-6.119,2.32-8.439,0 l-7.102-7.102c-3.657,1.96-7.601,3.456-11.753,4.406v9.199c0,3.282-2.685,5.968-5.968,5.968H53.629 c-3.283,0-5.969-2.686-5.969-5.968v-10.039c-4.063-1.232-7.896-2.993-11.417-5.205l-6.511,6.512c-2.323,2.321-6.12,2.321-8.441,0 l-8.818-8.818c-2.321-2.321-2.321-6.118,0-8.439l7.102-7.102c-1.96-3.657-3.456-7.6-4.405-11.751H5.968 C2.686,72.067,0,69.382,0,66.099V53.628c0-3.283,2.686-5.968,5.968-5.968h10.039c1.232-4.063,2.993-7.896,5.204-11.418l-6.511-6.51 c-2.321-2.322-2.321-6.12,0-8.44l8.819-8.819c2.321-2.321,6.118-2.321,8.439,0l7.101,7.101c3.658-1.96,7.601-3.456,11.753-4.406 V5.969C50.812,2.686,53.498,0,56.78,0h12.471c3.282,0,5.968,2.686,5.968,5.969v10.036c4.064,1.231,7.898,2.992,11.422,5.204 l6.507-6.509C95.471,12.379,99.268,12.379,101.589,14.7L101.589,14.7z M61.44,36.92c13.54,0,24.519,10.98,24.519,24.519 c0,13.538-10.979,24.519-24.519,24.519c-13.539,0-24.519-10.98-24.519-24.519C36.921,47.9,47.901,36.92,61.44,36.92L61.44,36.92z" />
                                </g>
                            </svg>
                            <div class="hidden-sidebar">Settings</div>
                        </a>
                    </li>
                    <li class="sidebar-list-item">
                        <a href="#" class="sidebar-link">
                            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px"
                                viewBox="0 0 122.88 122.88" style="enable-background:new 0 0 122.88 122.88"
                                xml:space="preserve">
                                <style type="text/css">
                                .st0 {
                                    fill-rule: evenodd;
                                    clip-rule: evenodd;
                                }
                                </style>
                                <g>
                                    <path class="st0"
                                        d="M122.88,61.44C122.88,27.51,95.37,0,61.44,0C27.51,0,0,27.51,0,61.44c0,33.93,27.51,61.44,61.44,61.44 C95.37,122.88,122.88,95.37,122.88,61.44L122.88,61.44z M68.79,74.58H51.3v-1.75c0-2.97,0.32-5.39,1-7.25 c0.68-1.87,1.68-3.55,3.01-5.1c1.34-1.54,4.35-4.23,9.01-8.11c2.48-2.03,3.73-3.88,3.73-5.56c0-1.71-0.51-3.01-1.5-3.95 c-1-0.93-2.51-1.4-4.54-1.4c-2.19,0-3.98,0.73-5.4,2.16c-1.43,1.44-2.34,3.97-2.74,7.56l-17.88-2.22c0.61-6.57,3-11.86,7.15-15.85 c4.17-4.02,10.55-6.01,19.14-6.01c6.7,0,12.1,1.4,16.21,4.19c5.6,3.78,8.38,8.82,8.38,15.1c0,2.62-0.73,5.14-2.16,7.56 c-1.44,2.44-4.39,5.39-8.85,8.88c-3.09,2.48-5.05,4.44-5.86,5.93C69.19,70.24,68.79,72.19,68.79,74.58L68.79,74.58z M50.68,79.25 h18.76v16.53H50.68V79.25L50.68,79.25z" />
                                </g>
                            </svg>
                            <div class="hidden-sidebar">Help</div>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="content">
            <div class="container-fluid">
            {{-- <h1>empty page</h1> --}}
                {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            <p>You are on admin page</p>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
    </div>
    </div>
    
    </div> --}}
    {{-- @if (isset($url)) --}}
    @yield('admin-content')
    {{-- <form action="{{Route('uploadtask')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="textarea" id="default" cols="30" rows="10" value=""></textarea>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="" required>
                </div>
            </div>
            <div class="col-md-2 d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <button type="button" id="calculate" class="btn btn-info mt-4">Calculate</button>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expense">Total Expense:</label>
                    <input type="number" class="form-control" id="expense" name="expense" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" class="form-control-file" id="file" name="file">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form> --}}
    </div>
    {{-- @else
    <form action="{{$url}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="textarea" id="default" cols="30" rows="10" value=""></textarea>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="" required>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="" required>
            </div>
        </div>
        <div class="col-md-2 d-flex justify-content-center align-items-center">
            <div class="form-group">
                <button type="button" id="calculate" class="btn btn-info mt-4">Calculate</button>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="expense">Total Expense:</label>
                <input type="number" class="form-control" id="expense" name="expense" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="file">Upload File:</label>
        <input type="file" class="form-control-file" id="file" name="file">
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
    </form>
    </div>
    @endif --}}


    {{-- @endsection --}}
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/script.js')}}"></script>  
    {{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
    @stack('tinymce')
    @stack('view-task')
    @stack('editmodal')
    @stack('edit-tinymce')
</body>

</html>