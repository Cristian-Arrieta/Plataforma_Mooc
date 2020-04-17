<div class="form-group">
	{{ Form::label('name','Nombre del Curso')}}
	{{ Form::text('name',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('description','Descripcion del Curso') }}
	{{ Form::text('description',null,['class' => 'form-control']) }}
</div>
<h3>Lista de Profesores</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($profesores as $user)
			<li>
				<label>
					{{ Form::checkbox('users[]',$user->id,null) }}
					{{ $user->name }}
					<em>{{ $user->description ?: 'N/A'}}</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>

