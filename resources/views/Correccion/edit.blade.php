@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $ex->name }} </div>

                <div class="card-body">
				<p><strong>Nombre : </strong>{{ $exam->users->name }}</p>
				<p><strong>Tipo de Examen :</strong>{{ $ex->tipo }}</p>
                <p><strong>Descripcion : </strong>{{ $ex->description }}</p>
				
				{!! Form::model($exam,['route' => ['User_exam.update',$exam->id],'method'=>'PUT'])!!}
					@include('correccion.forms.formEval')
					@include('correccion.forms.formNota')
					@include('correccion.forms.formFin')
				{!! Form::close() !!}
				
				<a href="javascript:history.back()" class="btn btn-sm btn-outline-info"> Volver </a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
