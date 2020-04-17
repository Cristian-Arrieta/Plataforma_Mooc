@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">		Categorias
					@can('categorias.create')
						<a href="{{route('categorias.create')}}" class="btn btn-primary">Crear</a>
					@endcan
				</div>

                <div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
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
									@can ('categorias.show')
										<a href="{{ route('categorias.show',$categoria->id) }}" class="btn btn-sm btn-outline-info">
										Ver</a>
									@endcan
								</td>
								<td width="10px" >
									@can ('categorias.edit')
										<a href="{{ route('categorias.edit',$categoria->id) }}" class="btn btn-sm btn-outline-info">
										Editar</a>
									@endcan
								</td>
								<td width="10px" >
									@can ('categorias.destroy')
										{!! Form::open(['route' => ['categorias.destroy',$categoria->id],
										'method'=>'DELETE']) !!}
											<button class="btn btn-sm btn-outline-danger">
												DELETE
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
