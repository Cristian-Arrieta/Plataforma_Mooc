@extends('layouts.app')

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>


@section('content')

        <div class="flex-center position-ref full-height">
            
            <div class="content ">
			<div class="card encab">
                <div class="title m-b-md">
                   <img src="{{asset('img/users/feature-3.png')}}" alt="Tu imgen de perfil" width="100" height="100" > PPEA
					<H3>
					Plataforma Profesional de Estudio Avanzado
				</H3>
                </div>				

                <div class="links">
                    <a href="{{route('categorias.index')}}">Categorias</a>
                    <a href="{{route('cursos.index')}}">Cursos</a>
                </div>
            
			</div>
			</div>
	</div>		
@endsection			