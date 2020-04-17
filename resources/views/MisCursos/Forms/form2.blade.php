
<h3>Lista de Profesores</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($profesores as $user)
			<li>
				<label>
					
					{{ $user->name }}
				</label>
			</li>
		@endforeach
	</ul>
</div>

<h3>Lista de Modulos </h3>
@if(count($modules) != 0)
<div class="form-group">
	<ul class="list-unstyled">	
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
							
							@if(($module->state == "Oculto")&&( Auth::user()->permisos('Alumno')))
							@else
							<tr>
								<td>{{$module->id}}</td>
								<td>{{$module->name}}</td>
								<td width="10px">
									@can('cursos.show')
										<a href="{{route('modules.show',$module->id)}}" class="btn btn-sm btn-outline-info"><span class="oi oi-eye"></span>
										Ver </a>
									@endcan
								</td>
								<td width="10px">
									@can('cursos.edit')
										<a href="{{route('modules.edit',$module->id)}}" class="btn btn-sm btn-outline-secondary"><span class="oi oi-pencil"></span>
										Editar </a>
									@endcan
								</td>
								<td width="10px">
									@can('cursos.destroy')
									{!! Form::open(['route' => ['cursos.destroy',$module->id],'method' => 'DELETE']) !!}
										<button class="btn btn-sm btn-outline-danger">
											<span class="oi oi-trash">Delete
										</button>
									{!! Form::close() !!}
									@endcan
								</td>
							</tr>
							@endif
						@endforeach
						</tbody>
					</table>
	</ul>
</div>
@else
	<p>No hay Modulos para este Curso</p>
@endif
										



