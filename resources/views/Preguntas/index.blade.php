@extends('layouts.app')

@section('content')

<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			
			
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				
				Preguntas
				@can('cursos.edit')
				@if(count($exam->preguntas)< 5)
					<a href="{{route('preguntas.create',$exam->id)}}" class="btn btn-primary">Crear Preguntas</a>
				@endif	
					
				@endcan
				</div>

                <div class="card-body">
				@if(!count($preguntas) == 0)
					<table class="table table-striped table-hover">
					<thead>
							<tr>
								<th width="10px">ID</th>
								<th>Pregunta</th>
								<th colspan=3>&nbsp;</th>
							</tr>
					</thead>
					<tbody>
						@foreach($preguntas as $pregunta)
						<tr>
							<td>{{$pregunta->id}}</td>
							<td>{{$pregunta->pregunta}}</td>
							<td width="10px">
								@can('cursos.show')
									<a href="{{route('preguntas.show',$pregunta->id)}}" class="btn btn-sm btn-outline-info">
									Ver </a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.edit')
									<a href="{{route('preguntas.edit',$pregunta->id)}}" class="btn btn-sm btn-outline-secondary">
									Editar </a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.destroy')
								{!! Form::open(['route' => ['preguntas.destroy',$pregunta->id],'method' => 'DELETE']) !!}
									<button class="btn btn-sm btn-outline-danger">
										Delete
									</button>
								{!! Form::close() !!}
								@endcan
							</td>
						</tr>
						@endforeach
					</tbody>	
					</table>
					
					@else
	
							<p>No hay Preguntas para este Examen</p>
							
					@endif
					@can ('cursos.edit')
					<a href="{{route('exams.edit',$exam->id)}}" class="btn btn-primary">
					Editar Examen
					</a>
					@endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
