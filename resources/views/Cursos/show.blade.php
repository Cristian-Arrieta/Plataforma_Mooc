@extends('layouts.app')

@section('content')

@if(($curso->video == null)||($curso->imagen == null))

	<div class="container full-height">
@else
	<div class="container ">
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Curso</div>

                <div class="card-body">
					<p><strong>Nombre : </strong>{{$curso->name}}</p>
					<p><strong>Descripcion : </strong>{{$curso->description}}</p>
					<p><strong>Tipo de Curso : </strong>{{$curso->tipo}}</p>
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
					
					@if($curso->tipo == "Preferencial")
						
						<p><strong>Inicio del Curso : </strong>{{$today = (new \DateTime($curso->inicio))->format('d-m-y')}}</p>
						<p><strong>Fin del Curso: </strong>{{$today = (new \DateTime($curso->fin))->format('d-m-y')}}</p>
						

					@endif
					
					
					@can('cursos.inscripcion')
						@if($aux)
							{!! Form::model($curso,['route' => ['cursos.inscripcion',$curso->id],
							'method'=>'PUT']) !!}
									<div class="form-group">
										{{ Form::submit('Inscripcion',['class' => 'btn btn-primary']) }}
									</div>
							{!! Form::close() !!}
						@else
							<p>Ya se encuentra inscripto</p>
						@endif
					@endcan
					
					<a href="javascript:history.back()" class="btn  btn-outline-info"> Volver </a>
                </div>
				
            </div>
        </div>
    </div>
</div>
@endsection
