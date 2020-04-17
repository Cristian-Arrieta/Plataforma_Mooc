@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pregunta</div>

                <div class="card-body">
				{!! Form::open(['route' => ['preguntas.store',$exam->id]]) !!}
					@include('preguntas.forms.form')
					@include('preguntas.forms.formFin')
				{!! Form::close() !!}
                
				
					<a href="{{route('preguntas.index',$exam->id)}}" class="btn btn-sm btn-outline-info"> Volver </a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
