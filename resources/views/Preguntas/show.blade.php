@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pregunta</div>

                <div class="card-body">
					<p><strong>Pregunta : </strong>{{ $pregunta->pregunta }}</p>
					
					<p><strong>Opcion1 : </strong>{{ $pregunta->opcion1 }}</p>					
					<p><strong>Opcion2 : </strong>{{ $pregunta->opcion2 }}</p>
					
					@if($pregunta->opcion3 != null)
					<p><strong>Opcion3 : </strong>{{ $pregunta->opcion3 }}</p>
					@endif
					@if($pregunta->opcion4 != null)
					<p><strong>Opcion4 : </strong>{{ $pregunta->opcion4 }}</p>
					@endif
					@if($pregunta->opcion5 != null)
					<p><strong>Opcion5 : </strong>{{ $pregunta->opcion5 }}</p>
					@endif
					<a href="javascript:history.back()" class="btn btn-sm btn-outline-info"> Volver </a>
					
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
