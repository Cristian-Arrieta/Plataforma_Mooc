<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   @section('miScript')
    <!--  Scripts  -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		@show
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
       <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: black;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
			
			

            .full-height {
                height: 100vh;
            }
			.med-height {
                height: 17vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
       
    .cuerpo { background-image: url("{{asset('img/users/hero.jpg')}}");
	background-repeat: no-repeat;
	background-size: cover;
        -moz-background-size: cover;
		background-color:black;}
		
	.encab { background-image: url("{{asset('img/users/hero-bg.jpg')}}");}
	
	.contorno{background-image: url("{{asset('img/users/portfolio-01.jpg')}}");
		background-size: cover;
        -moz-background-size: cover;
        -webkit-background-size: cover;
        -o-background-size: cover;}
	
		footer {
			font-size: 15px;
			background-color:green;
            position: relative;
            margin-top: -50px;
            height: 40px;
            padding:5px 0px;
            clear: both;
            text-align: center;
            color: black;
        }


	</style>
    <!-- Styles -->
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />
	
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel contorno">
            <div class="container encab">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <!--   {{ config('app.name', 'Laravel') }}-->
				  <img src="{{asset('img/users/feature-3.png')}}" alt="Tu imgen de perfil" width="40" height="40" >
					PPEA
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <!--  Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						@can('users.index')
						<li class="nav-item">
							<a  class="nav-link" href="{{route('users.index')}}">Usuarios</a>
						</li>
						@endcan
						@can('roles.index')
						<li class="nav-item">
							<a  class="nav-link" href="{{route('roles.index')}}">Roles</a>
						</li>
						@endcan
						
						<li class="nav-item">
							<a  class="nav-link" href="{{route('categorias.index')}}">Categorias</a>
						</li>
						
						
						<li class="nav-item">
							<a  class="nav-link" href="{{route('cursos.index')}}">Cursos</a>
						</li>
						
						
						@can('cursos.index')
						<li class="nav-item">
							<a  class="nav-link" href="{{route('MisCursos.index2')}}">Mis Cursos</a>
						</li>
						@endcan
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
									<img src="{{ (Auth::user()->getPhotoRouteAttribute())}}" alt="Tu imgen de perfil" width="30" height="40" > <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								
									<!-- Editado -->
									 @can('users.perfil')
									<a class="dropdown-item" href="{{ route('users.perfil',Auth::user()->id) }}"
                                       >
                                        {{ __('Perfil') }}
                                    </a>
									@endcan
									<!-- Editado -->
								
								
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
<main class="py-1" style="background-color:black;"></main>
        <main class="py-4 cuerpo">
		@if(session('info'))
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2">
						<div class="alert alert-success">
							{{ session('info')}}
						</div>
					</div>
				</div>
			</div>		
		@endif
		@if(session('alerta'))
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-8 col-md-offset-2">
						<div class="alert alert-danger">
							{{ session('alerta')}}
						</div>
					</div>
				</div>
			</div>		
		@endif		
            @yield('content')

			
        </main>
    </div>
	<main class="py-5" style="background-color:black;"></main>
		<footer class="flex-center position-ref  med-height  contorno">
			<div class="container">
				<div class="row">
					<div class="col-md-5">
						<h1 class="footer-logo">
						<img src="{{asset('img/users/feature-3.png')}}" alt="PPEA" width="70" height="70">PPEA
						</h1>
						<p>Un plataforma de estudio gratuito para todos
					</div>
					<div class="col-md-7 ">
						<ul class="footer-nav ">
							<li><a href="https://www.facebook.com/" style="color: white; font-size: 16px; "> <img src="{{asset('img/users/facebook.png')}}" alt="Tu imgen de perfil" width="30" height="30" >Facebook</a></li>
							<li><a href="https://twitter.com/"style="color: white; font-size: 16px; "><img src="{{asset('img/users/twitter.png')}}" alt="Tu imgen de perfil" width="30" height="30" >Twitter</a></li>
							<li><a href="https://www.youtube.com"style="color: white; font-size: 16px; "><img src="{{asset('img/users/youtube.png')}}" alt="Tu imgen de perfil" width="30" height="30" >Youtube</a></li>
							<li><a href="https://www.instagram.com/"style="color: white; font-size: 16x; "><img src="{{asset('img/users/instagram.png')}}" alt="Tu imgen de perfil" width="30" height="30" >Instagram</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
</body>
</html>
