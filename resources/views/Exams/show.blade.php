@extends('layouts.app')

@section('content')
@if(($exam != null) && (count($exam->preguntas) > 3))
	<div class="container ">
@else
	<div class="container full-height">
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Examen</div>
				<div class="card-header"> 
				<a href="{{route('MisCursos.misshow',$module->cursos[0]->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->cursos[0]->name}}</a>
				=> 
				<a href="{{route('modules.show',$module->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->name}} </a>
				=>  Modelo de Examen
				
				</div>
                <div class="card-body">
				
				@if($exam != null)
				
				<p><strong>Titulo : </strong>{{ $exam->name }}</p>
				<p><strong>Tipo de Examen :</strong>{{ $exam->tipo }}</p>
                <p><strong>Descripcion : </strong>{{ $exam->description }}</p>
				
				{!! Form::model($exam,['route' => ['exams.modelo',$exam->id],'method'=>'PUT'])!!}
					@include('exams.forms.formExam')
				{!! Form::close() !!}
				
				@can('cursos.edit')
									<a href="{{route('exams.edit',$exam->id)}}" class="btn  btn-outline-secondary">
									Editar </a><br><br>
				@endcan
				
				@else
					<p>No Existe un Modelo de Examen para este Modulo</p>
					@can('cursos.edit')
						<a href="{{route('exams.create',$module->id)}}" class="btn btn-primary">Crear Examen</a><br><br>
					@endcan
				@endif
				
				<a href="{{route('modules.show',$module->id)}}" class="btn  btn-outline-info"> Modulo </a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
