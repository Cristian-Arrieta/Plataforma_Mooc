@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categoria</div>

                <div class="card-body">
					{!! Form::open(['route' => ['categorias.store']]) !!}
						@include('categorias.forms.form')
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
