@extends('layouts.app')

@section('content')
<div class="container full-height">
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
                <div class="card-body">
				
					{!! Form::open(['route' => ['modules.store',$curso->id]]) !!}
						@include('modules.forms.form')
						@include('modules.forms.formFin')
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
