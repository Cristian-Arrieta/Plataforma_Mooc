@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				Roles
				<div class="row">
					<div class= "col-md-12">
						<div class="page-header">
							 
								
								{{ Form::open(['route' => 'roles.filtro','method' => 'GET','class' => 'form-inline pull-right'])}}
									
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
				@can('roles.create')
					<a href="{{route('roles.create')}}" class="btn btn-primary">Crear ROL</a>
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
						@foreach($roles as $role)
						<tr>
							<td>{{$role->id}}</td>
							<td>{{$role->name}}</td>
							<td width="10px">
								@can('roles.show')
									<a href="{{route('roles.show',$role->id)}}" class="btn btn-sm btn-outline-info">
									<span class="oi oi-eye"></span> Ver </a>
								@endcan
							</td>
							<td width="10px">
								@can('roles.edit')
									<a href="{{route('roles.edit',$role->id)}}" class="btn btn-sm btn-outline-secondary">
									<span class="oi oi-pencil"></span> Editar </a>
								@endcan
							</td>
							<td width="10px">
								@can('roles.destroy')
								{!! Form::open(['route' => ['roles.destroy',$role->id],'method' => 'DELETE']) !!}
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
					{{ $roles->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
