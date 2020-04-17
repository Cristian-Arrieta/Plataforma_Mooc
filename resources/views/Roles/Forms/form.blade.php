<div class="form-group">
	{{ Form::label('name','Nombre del Rol') }}
	{{ Form::text('name',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('slug','Url amigable') }}
	{{ Form::text('slug',null,['class' => 'form-control'])}}	
</div>
<div class="form-group">
	{{ Form::label('description','Descripcion del Rol') }}
	{{ Form::textarea('description',null,['class' => 'form-control'])}}	
</div>
<hr>
	<h3>Permisos Especiales</h3>
	<div class="form-group">
		<label>{{Form::radio('special','all-access')}} Acceso Total</label>
		<label>{{Form::radio('special','no-access')}} Ningun Acceso</label>
	</div>
		<h3>Lista de Permisos</h3><hr noshade="noshade" />
		<div class="form-group">
			<ul class="list-unstyled">
				@foreach($permissions as $permission)
					<li>
						<label>
							{{ Form::checkbox('permissions[]',$permission->id,null)}}
							{{ $permission->name}}-->
							<em>({{ $permission->description ?: 'N/A'}})
							
						</label><hr noshade="noshade" />
					</li>
				@endforeach
			</ul>
		</div>
</hr>
<div class="form-group">
	{{ Form::submit('Guardar',['class' => 'btn  btn-primary']) }}
</div>