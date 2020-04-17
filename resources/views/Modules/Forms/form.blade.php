<div class="form-group">
	{{ Form::label('name','Nombre del Modulo') }}
	{{ Form::text('name',null ,['class' => 'form-control'])}}
</div>

<div class="form-group">
	{{ Form::label('description','Descripcion del Modulo') }}	
	{{ Form::textarea('description', null, ['class'=>'form-control']) }}
</div>

