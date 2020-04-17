<div class="form-group">
	{{ Form::label('name','Nombre del Tema') }}
	{{ Form::text('name',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('texto','Contenido del Tema') }}
	
	{{ Form::textarea('texto', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('urlVideo','Video del Tema') }}
	{{ Form::text('urlVideo',null,['class' => 'form-control'])}}	
</div>

<p class="text-muted"> *Ejmp : "https://www.youtube.com/embed/etc..." </p></center>

<div class="form-group">
	{{ Form::label('urlMaterial','Material del Tema') }}
	{{ Form::text('urlMaterial',null,['class' => 'form-control'])}}	
</div>


