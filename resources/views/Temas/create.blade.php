@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tema</div>
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
				{!! Form::open(['route' => ['temas.store',$module->id]]) !!}
					@include('temas.forms.form')
					@include('temas.forms.formFin')
				{!! Form::close() !!}
                
				
					<a href="{{route('temas.index',$module->id)}}" class="btn btn-sm btn-outline-info"> Volver </a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
