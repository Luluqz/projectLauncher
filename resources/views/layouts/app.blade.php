<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project Launcher</title>

    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    @stack('css-stack')
    <link href="{{ URL::asset('assets/css/categories.css') }}" type='text/css' rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css') }}" type='text/css' rel="stylesheet">


    <!-- Javascripts -->
    <script
      src="https://code.jquery.com/jquery-2.2.4.min.js"
      integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
      crossorigin="anonymous">      
    </script>

    <style>
        body {
            font-family: 'Roboto';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-resp" href="{{ url('/') }}">
                    <img src="{{ URL::asset('assets/img/logo-header.png') }}" alt="">
                </a>

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar  -->
                <ul class="nav navbar-nav">
                    <li><a id="trigger-overlay">Découvrir</a></li>
                    <li><a href="{{ url('/home/create') }}">Démarrer un projet</a></li>
                </ul>

                                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ URL::asset('assets/img/logo-header.png') }}" alt="">
                </a>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <form class="navbar-form navbar-left" role="form" action="">
                        <div class="form-group">
                        {!! Form::text('search', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                    'placeholder'=>'Chercher un projet...')) !!}
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Connexion</a></li>
                        <li><a href="{{ url('/register') }}">Inscription</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->firstname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/home/account') }}"><i class="fa fa-btn fa-user-circle"></i>Mon compte</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                        
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="overlay overlay-slidedown">
        <button type="button" class="overlay-close">Close</button>
        <nav>
            <ul>
                @foreach ($default_categories as $cat)
                    <li>{!! link_to_route('category', $cat->name, ['id' => $cat->id]) !!}</li>
                @endforeach
            </ul>
        </nav>
    </div>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <h4><i class="fa fa-flag" aria-hidden="true"></i>  <span> CATAGORIES</span></h4>
                    <ul>
                        <li><a href="{{ url('/home/category/1') }}">ART</a></li>
                        <li><a href="{{ url('/home/category/2') }}">BD</a></li>
                        <li><a href="{{ url('/home/category/3') }}">Artisanat</a></li>
                        <li><a href="{{ url('/home/category/4') }}">Danse</a></li>
                        <li><a href="{{ url('/home/category/5') }}">Design</a></li>
                        <li><a href="{{ url('/home/category/6') }}">Mode</a></li>
                        <li><a href="{{ url('/home/category/7') }}">Cinéma et vidéo</a></li>
                        <li><a href="{{ url('/home/category/8') }}">Gastronomie</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-4">
                    <h4 style="color:#FEB41C;"><span style="border-color:#FEB41C;">CATEGORIES</span></h4>
                    <ul>
                        <li><a href="{{ url('/home/category/9') }}">Jeux</a></li>
                        <li><a href="{{ url('/home/category/10') }}">Journalisme</a></li>
                        <li><a href="{{ url('/home/category/11') }}">Musique</a></li>
                        <li><a href="{{ url('/home/category/12') }}">Photographie</a></li>
                        <li><a href="{{ url('/home/category/13') }}">Edition</a></li>
                        <li><a href="{{ url('/home/category/14') }}">Technologie</a></li>
                        <li><a href="{{ url('/home/category/15') }}">Théâtre</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-4">
                    <h4><i class="fa fa-bars" aria-hidden="true"></i>  <span>  LIENS DE MENU</span></h4>
                    <ul>
                        <li><a href="{{ url('/login') }}">Connexion</a></li>
                        <li><a href="{{ url('/register') }}">Inscription</a></li>
                        <li><a href="">Découvrir</a></li>
                        <li><a href="{{ url('/home/create') }}">Démarrer un projet</a></li>
                        <li><a href="">CGU</a></li>
                        <li><a href="">Mentions légales</a></li>
                        <li><a href="">Page Facebook</a></li>
                        <li><a href="">Instragram</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-4">
                    <img src="{{ URL::asset('assets/img/logo-PL-white.png') }}" alt="">
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <script src="{{ URL::asset('assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ URL::asset('assets/js/classie.js') }}"></script>
    <script src="{{ URL::asset('assets/js/categories.js') }}"></script>
    @stack('js-stack')
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
</body>
</html>
