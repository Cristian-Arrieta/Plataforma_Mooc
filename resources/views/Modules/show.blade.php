@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modulo</div>
				<div class="card-header">	
				<a href="{{route('MisCursos.misshow',$module->cursos[0]->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->cursos[0]->name}} </a>
				=> 
				<a href="{{route('modules.show',$module->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->name}}</a>
				</div>
                <div class="card-body">
					<p><strong>Nombre : </strong>{{ $module->name }}</p>
					<p><strong>Descripcion : </strong>{{ $module->description }}</p>
                
				{!! Form::open(['route' => ['modules.show',$module->id]]) !!}
					@include('modules.forms.form2')
				{!! Form::close() !!}
				<a href="javascript:history.back()" class="btn btn-outline-info"> Volver </a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
