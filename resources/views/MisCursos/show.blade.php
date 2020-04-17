@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Curso</div>

                <div class="card-body">
					<p><strong>Nombre : </strong>{{$curso->name}}</p>
					
						@if($curso->imagen != null)
				
					<div class="form-group">
						
						<center>
						<!--	<img src="data:image/jpg; base64 , {($user->getPhotoRouteAttribute())} " alt="Tu imgen de perfil" width="300" height="400"> -->
						
							<img src="{{($curso->getPhotoRouteAttribute())}} " alt="Tu imgen de perfil" width ="100%"   height = "500 %"  position ="fixed">
						</center>
					</div>
					@endif
					
					@if($curso->video != null)
						
						<div class="card-body">
						
						<center>
							<iframe width="560" height="315" src="{{$curso->video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>
							</center>
						</div>	
					@endif
					
					<p><strong>Descripcion : </strong>{{$curso->description}}</p>
					
					{!! Form::model($curso,['route' => ['cursos.update',$curso->id],
					'method'=>'PUT']) !!}
						@include('miscursos.forms.form2')
					{!! Form::close() !!}	
					
					@can('cursos.inscripcion')
						<a href="{{route('User_exam.estado',$curso->id)}}" class="btn  btn-secondary"> Estado </a><br><br>
					@endcan
					@can('cursos.edit')
						<a href="{{route('User_exam.listado',$curso->id)}}" class="btn  btn-secondary"> Alumnos </a><br><br>
					@endcan
<a href="javascript:history.back()" class="btn btn-outline-info"> Volver </a>					
            </div>
        </div>
    </div>
</div>
@endsection
