@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			
			
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				Examen
				</div>
				<div class="card-header"> 
				<a href="{{route('MisCursos.misshow',$modules[0]->cursos[0]->id)}}" class="btn btn-sm btn-outline-info">
				{{$modules[0]->cursos[0]->name}}</a>
				=> Estado Actual
				
				</div>

                <div class="card-body">
				@if(!count($modules) == 0)
					<table class="table table-striped table-hover" border>
					<thead>
							<tr>								
								<th>Modulo</th>
								<th>Resultado</th>
								<th >Examen</th>
							</tr>
					</thead>
					<tbody>
						@foreach($modules as $module)
						@if(!empty($module->exams[0]))
						<tr>						
							<td>{{$module->name}}</td>
							<td width="10px">{{$module->exams[0]->nota()}}</td>
							<td width="10px">
								@can(('cursos.show')&& ($module->exams[0]->nota() != null))
									<a href="{{route('User_exam.show',$module->id)}}" class="btn btn-sm btn-outline-info">
									Ver </a>
								@endcan
							</td>
						</tr>
						@endif
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
