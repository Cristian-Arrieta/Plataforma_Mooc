@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			
			
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				Temas
				@can('cursos.edit')
					<a href="{{route('temas.create',$module->id)}}" class="btn btn-primary">Crear Tema</a>
				@endcan
				</div>
				<div class="card-header">	
				<a href="{{route('MisCursos.misshow',$module->cursos[0]->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->cursos[0]->name}} </a>
				=> 
				<a href="{{route('modules.show',$module->id)}}" class="btn btn-sm btn-outline-info">
				{{$module->name}}</a>
				=> Temas
				</div>

                <div class="card-body">
				@if(!count($temas) == 0)
					<table class="table table-striped table-hover">
					<thead>
							<tr>
								<th width="10px">ID</th>
								<th>Nombre</th>
								<th colspan=3>&nbsp;</th>
							</tr>
					</thead>
					<tbody>
						@foreach($temas as $tema)
						<tr>
							<td>{{$tema->id}}</td>
							<td>{{$tema->name}}</td>
							<td width="10px">
								@can('cursos.show')
									<a href="{{route('temas.show',$tema->id)}}" class="btn btn-sm btn-outline-info">
									Ver </a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.edit')
									<a href="{{route('temas.edit',$tema->id)}}" class="btn btn-sm btn-outline-secondary">
									Editar </a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.destroy')
								{!! Form::open(['route' => ['temas.destroy',$tema->id],'method' => 'DELETE']) !!}
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
	
							<p>No hay Temas para este Modulo</p>
							
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
