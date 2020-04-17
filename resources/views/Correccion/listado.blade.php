@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			
			 
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				Listado
				
				</div>

                <div class="card-body">
				@if(!count($modules) == 0)
					<table class="table table-striped table-hover">
					<thead>
							<tr>
								<th width="10px">ID</th>
								<th>Nombre</th>
								@foreach($modules as $module)
									<th>{{$module->name}}</th>
								@endforeach
								<th colspan=3>Certificado</th>
							</tr>
					</thead>
					<tbody>
					
						@foreach($users as $user)
							
						<tr>
							<td>{{$user->id}}</td>
							
							<td>{{$user->name}}</td>
							
								@foreach($modules as $module)
								
								@if ($module->modulo_examen($user) != 'N/R' && $module->modulo_examen($user) != 'N/C')
									<td >
										<a href="{{route('User_exam.edit',$module->modulo_examen($user))}}" class="btn btn-sm btn-outline-info"> {{$module->modulo_examen($user)['nota']}} </a>
									</td>	
								@else
									<td >
										 {{$module->modulo_examen($user)}}
									</td>
								@endif	
							
							@endforeach
							
							<td width="10px">
								@can('cursos.show')
									<a href="{{route('Certificado.imprimir',[$user,$module->cursos[0]])}}" class="btn btn-sm btn-outline-info"> Enviar </a>
								@endcan
							</td>
						</tr>
						
						
							
						@endforeach
						
					</tbody>	
					</table>
					<label> N/C = No Corregido</label><br>
					<label> N/R = No Rendido</label><br><br>
					@else
	
							<p>No hay Examenes para este Modulo</p>
							
					@endif
					@can ('cursos.edit')
					<a href="javascript:history.back()" class="btn btn-outline-info"> Volver </a>
					@endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

