<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Index</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.2/semantic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Acme|Allan|Comfortaa|Fredoka+One|Fugaz+One|Righteous|Volkhov" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Francois+One|Noto+Sans+TC|Oswald|Pontano+Sans" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet"> 
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <!-- <script>tinymce.init({ selector:'textarea' });</script> -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel ui borderless main menu ">
            <div class="container ">
                <a class="navbar-brand nav-item item" href="{{ url('/') }}">
                    Index System
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav mr-auto"> -->

                            <ul class="nav nav-pills" style="margin-left: 35px">
                                  <li class="nav-item">
                                    <a class="nav-link item" href="{{route('submit_idea_form')}}">Submit Idea</a>
                                  </li>

                                  <li class="nav-item dropdown">
                                    <a class="nav-link  dropdown-toggle item" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">IDEA</a>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item item" href="{{ route('idea_thesis') }}">Thesis</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item item " href="{{ route('idea_project') }}">Project</a>
                                    </div>
                                  </li>

                                  

                                  

                                  <li class="nav-item">
                                    <a class="nav-link item" href="{{route('favorite')}}">Favorite</a>
                                  </li>

                                  <li class="nav-item">
                                    <a class="nav-link item" href="{{route('submit_files_form')}}">Submit Files</a>
                                  </li>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link item dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Index</a>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item item" href="{{ route('thesis') }}">Thesis</a>
                                      <div class="dropdown-divider"></div>
                                      <a class="dropdown-item item" href="{{ route('project') }}">Project</a>
                                    </div>
                                  </li>
                            </ul>


                    <!-- </ul> -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else 

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<!-- <script src="semantic/dist/semantic.min.js"></script> -->
</body>
</html>
