@extends('layouts.app')

@section('content')

<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">		Categorias
				
				<div class="row">
					<div class= "col-md-12">
						<div class="page-header">
							 
								
								{{ Form::open(['route' => 'categorias.filtro','method' => 'GET','class' => 'form-inline pull-right'])}}
									
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
				
				
					@can('categorias.create')
						<a href="{{route('categorias.create')}}" class="btn btn-primary">Crear</a>
					@endcan
				</div>

                <div class="card-body">
					<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th width="10px">ID</th>
								<th>Nombre</th>
								<th colspan=3>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categorias as $categoria)
							<tr>
								<td>{{ $categoria->id }}</td>
								<td>{{ $categoria->name }}</td>
								<td width="10px" >
									
										<a href="{{ route('cursos.filtroCat',$categoria->id) }}" class="btn btn-sm btn-outline-info">
										<span class="oi oi-eye"></span> Ver</a>
									
								</td>
								<td width="10px" >
									@can ('categorias.edit')
										<a href="{{ route('categorias.edit',$categoria->id) }}" class="btn btn-sm btn-outline-secondary">
										<span class="oi oi-pencil"></span> Editar</a>
									@endcan
								</td>
								<td width="10px" >
									@can ('categorias.destroy')
										{!! Form::open(['route' => ['categorias.destroy',$categoria->id],
										'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-outline-danger">
											<span class="oi oi-trash">	DELETE
											</button>
										{!! Form::close() !!}
									@endcan
								</td>
							</tr>
							@endforeach
						</tbody>						
					</table>
						{{ $categorias->render()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
