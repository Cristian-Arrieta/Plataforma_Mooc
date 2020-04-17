@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Examen</div>
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
                <div class="card-body">
				<p><strong>Titulo : </strong>{{ $exam->name }}</p>
				<p><strong>Tipo de Examen :</strong>{{ $exam->tipo }}</p>
                <p><strong>Descripcion : </strong>{{ $exam->description }}</p>
					
					{!! Form::model($exam,['route' => ['exams.nota',$exam->id],'files' => true,'method'=>'PUT'])!!}
						
						@include('exams.forms.formExam')
						@include('exams.forms.formFin')
					{!! Form::close() !!}	
				
				
				</div>
            </div>
        </div>
    </div>
</div>
@endsection