@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modulo</div>
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
				<a href="{{route('MisCursos.misshow',$module->cursos[0]->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->cursos[0]->name}} </a>
				=> 
				<a href="{{route('modules.show',$module->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->name}}</a>
				</div>

                <div class="card-body">
					{!! Form::model($module,['route' => ['modules.update',$module->id],'method'=>'PUT'])!!}
						
						@include('modules.forms.form')
						@include('modules.forms.form2')
						@include('modules.forms.formFin2')
						
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
