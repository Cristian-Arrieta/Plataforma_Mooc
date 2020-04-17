@extends('layouts.app')

@section('content')
@if(($users != null) && (count($users)> 9))
<div class="container">
@else
<div class="container full-height">	
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
				Usuarios
					<div class="row">
					<div class= "col-md-12">
						<div class="page-header">
							
								
								{{ Form::open(['route' => 'users.filtro','method' => 'GET','class' => 'form-inline pull-right'])}}
									
									<div class="form-group">
									{{ Form::text('name',null,['class' => 'form-control' , 'placeholder' => 'Name'])}}
									</div>
									<div class="form-group">
									{{ Form::text('email',null,['class' => 'form-control' , 'placeholder' => 'Email'])}}
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
				</div>

				
                <div class="card-body">
					<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th>ID</th>
								<th>Nombre</th>
								<th colspan=3>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{$user->id}}</td>
									<td>{{$user->name}}</td>
									<td width="10px">
										@can ('users.show')
											<a href="{{ route('users.show',$user->id) }}" 
											class="btn btn-sm btn-outline-info"><span class="oi oi-eye"> Ver</a>
										@endcan
									</td>
									<td width="10px">
										@can ('users.edit')
											<a href="{{ route('users.edit',$user->id) }}"
											class="btn btn-sm btn-outline-secondary"> <span class="oi oi-pencil">   Editar</a>
										@endcan
									</td>
									<td width="10px">
										@can ('users.destroy')
											{!!Form::open(['route' => ['users.destroy',$user->id],
											'method' => 'DELETE'])!!}
												<button class="btn btn-sm btn-outline-danger">
												<span class="oi oi-trash">		Eliminar
												</button>
											{!!Form::close()!!}	
										@endcan
									</td>
								</tr>
							@endforeach	
						</tbody>
					</table>
					{{ $users->render() }}					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
