<div class="form-group">
	{{ Form::label('name','Nombre de Categoria') }}
	{{ Form::text('name',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('name','Descripcion de Categoria') }}
	{{ Form::text('description',null,['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::submit('Guardar',['class' => 'btn btn-sm btn-primary']) }}
</div>
