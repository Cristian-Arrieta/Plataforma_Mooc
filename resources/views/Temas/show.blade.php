@extends('layouts.app')

@section('content')
@if($tema->texto == null)

	<div class="container  full-height">
@else
	<div class="container">
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center><h3>Tema</h3></center></div>
				<div class="card-header">
				<a href="{{route('MisCursos.misshow',$tema->modules[0]->cursos[0]->id)}}" class="btn btn-sm btn-outline-info">
				{{$tema->modules[0]->cursos[0]->name}}</a>
				=> 
				<a href="{{route('modules.show',$tema->modules[0]->id)}}" class="btn btn-sm btn-outline-info">
					{{$tema->modules[0]->name}} </a>
					=>
				<a href="{{route('temas.show',$tema->id)}}" class="btn btn-sm btn-outline-info">	
					{{$tema->name}}</a>
				</div>
                <div class="card-body">
					<h5><strong>Nombre : </strong>{{ $tema->name }}</h5><br>
					
					@if($tema->urlVideo != null)
					<h5><strong>Video </strong></h5><center>
					<iframe width="560" height="315" src="{{$tema->urlVideo}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br></center>
					@endif
					<h5><strong>Contenido :</strong></h5><p>{{ $tema->texto }}</p><br>
					

					@if($tema->urlMaterial)
					<h5><strong>Material : </strong><a href="{{ $tema->urlMaterial }}">VER</a></h5>
					@endif
					<br>
					<a href="javascript:history.back()" class="btn btn-sm btn-outline-info"> Volver </a>
					<a href="{{route('temas.next',$tema->id)}}" class="btn btn-sm btn-outline-info"> Siguiente </a>
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
