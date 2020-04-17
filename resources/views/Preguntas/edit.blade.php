@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pregunta</div>

                <div class="card-body">
					{!! Form::model($pregunta,['route' => ['preguntas.update',$pregunta->id],'method'=>'PUT']) !!}
						@include('preguntas.forms.form')
						@include('preguntas.forms.formFin')
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
