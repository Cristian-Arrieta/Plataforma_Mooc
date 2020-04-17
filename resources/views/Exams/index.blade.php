@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">				
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				Examen
				@can('cursos.edit')
					<a href="{{route('exams.create',$module->id)}}" class="btn btn-primary">Crear Examen</a>
				@endcan
				</div>

                <div class="card-body">
				@if(!count($exams) == 0)
					<table class="table table-striped table-hover">
					<thead>
							<tr>
								<th width="10px">ID</th>
								<th>Nombre</th>
								<th colspan=3>&nbsp;</th>
							</tr>
					</thead>
					<tbody>
						@foreach($exams as $exam)
						<tr>
							<td>{{$exam->id}}</td>
							<td>{{$exam->users->name}}</td>
							<td width="10px">
								@can('cursos.show')
									<a href="{{route('exams.show',$exam->exam_id)}}" class="btn btn-sm btn-outline-info">
									Corregir </a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.edit')
									<a href="{{route('exams.edit',$exam->exam_id)}}" class="btn btn-sm btn-outline-secondary">
									Editar </a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.edit')
								{!! Form::open(['route' => ['exams.destroy',$exam->exam_id],'method' => 'DELETE']) !!}
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
	
							<p>No hay Examen para este Modulo</p>
							
					@endif
					@can ('cursos.edit')
					<a href="{{route('modules.edit',$module->id)}}" class="btn btn-primary">
					Editar Modulo
					</a>
					@endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

