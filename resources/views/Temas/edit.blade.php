@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Temas</div>
				
				@if($errors->any())
							<div class="alert alert-danger">
								<h5>Por favor completar correctamente los siguientes Campos</h5>
								<ul>
								@foreach($errors->all() as $error)
									
										<li>{{$error}}</li>
									
								@endforeach
								</ul>
							</div>
				@endif	
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
					{!! Form::model($tema,['route' => ['temas.update',$tema->id],'method'=>'PUT']) !!}
						@include('temas.forms.form')
						@include('temas.forms.formFin')
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
