@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			
			
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				Modulos
				@can('cursos.edit')
					<a href="{{route('modules.create',$curso->id)}}" class="btn btn-primary">Crear Modulo</a>
				@endcan
				</div>
	
                <div class="card-body">
				@if(!count($modules) == 0)
					<table class="table table-striped table-hover">
					<thead>
							<tr>
								<th width="10px">ID</th>
								<th>Nombre</th>
								<th colspan=3>&nbsp;</th>
							</tr>
					</thead>
					<tbody>
						@foreach($modules as $module)
						<tr>
							<td>{{$module->id}}</td>
							<td>{{$module->name}}</td>
							<td width="10px">
								@can('cursos.show')
									<a href="{{route('modules.show',$module->id)}}" class="btn btn-sm btn-outline-info">
									Ver </a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.edit')
									<a href="{{route('modules.edit',$module->id)}}" class="btn btn-sm btn-outline-secondary">
									Editar</a>
								@endcan
							</td>
							<td width="10px">
								@can('cursos.destroy')
								{!! Form::open(['route' => ['modules.destroy',$module->id],'method' => 'DELETE']) !!}
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
				
					<p>No hay Modulos para este Curso</p>
				
			@endif
			
				
					<a href="{{route('cursos.edit',$curso->id)}}" class="btn btn-primary">
					Editar Curso
					</a>
				</div>	
				
            </div>
        </div>
    </div>
</div>
@endsection
