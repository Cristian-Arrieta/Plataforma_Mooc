@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
					Curso
					
					<div class="row">
					<div class= "col-md-12">
						<div class="page-header">
							 								
								{{ Form::open(['route' => 'MisCursos.filtro','method' => 'GET','class' => 'form-inline pull-right'])}}
									
									<div class="form-group">
									{{ Form::text('name',null,['class' => 'form-control' , 'placeholder' => 'Name'])}}
									</div>
									<div class="form-group">
									{{ Form::text('desc',null,['class' => 'form-control' , 'placeholder' => 'Desc'])}}
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-secondary">
											<span class="oi oi-magnifying-glass"></span>
										</button>
									</div>
								{{ Form::close() }}
							
						</div>
					</div>
				</div>
					
					@can('cursos.create')
						<a href="{{route('cursos.create')}}" class="btn btn-primary">
							Crear
						</a>
					@endcan
				</div>

                <div class="card-body">
				@if(count($cursos) != 0)	
                    <table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th width="10px">ID</th>
								<th>Nombre</th>
								<th colspan=3>&nbsp;</th>
							</tr>
						</thead>							
						<tbody>
						
							@foreach($cursos as $curso)
							<tr>
								<td>{{$curso->id}}</td>
								<td>{{$curso->name}}</td>
								<td width="10px">
									@can('cursos.show')
										<a href="{{route('MisCursos.misshow',$curso->id)}}" class="btn btn-sm btn-outline-info">
										<span class="oi oi-eye"></span> Ver </a>
									@endcan
								</td>
								<td width="10px">
									@can('cursos.edit')
										<a href="{{route('cursos.edit',$curso->id)}}" class="btn btn-sm btn-outline-secondary">
										<span class="oi oi-pencil"></span> Editar </a>
									@endcan
								</td>
								<td width="10px">
									@can('curso.destroy')
									{!! Form::open(['route' => ['cursos.destroy',$curso->id],'method' => 'DELETE']) !!}
										<button class="btn btn-sm btn-outline-danger">
											<span class="oi oi-trash"> Delete
										</button>
									{!! Form::close() !!}
									@endcan
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					
				@else	
					<p>Este Usuario no se encuentra relacionado con ningun Curso</p>
				@endif	
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
