<div class="form-group">
	{{ Form::label('name','Nombre del Usuario')}}
	{{ Form::text('name',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('lastname','Apellido del Usuario')}}
	{{ Form::text('lastname',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('dni','DNI del Usuario')}}
	{{ Form::text('dni',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('phone_number','Telefono del Usuario')}}
	{{ Form::text('phone_number',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('email','E-mail')}}
	{{ Form::text('email',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('password','Password')}}
	{{ Form::password('password',['class' => 'form-control'])}}
</div>
<div class="form-group">
	<label for="validationCustom04">Imagen de Perfil</label>
	<center>
	<!--	<img src="data:image/jpg; base64 , {{($user->getPhotoRouteAttribute())}} " alt="Tu imgen de perfil" width="300" height="400"> -->
		<img id="uploadForm" src="{{($user->getPhotoRouteAttribute())}} " alt="Tu imgen de perfil" width="300" height="400">
	</center>
</div>
<div class="col-md-10 mb-3">
<div class="form-group"><center>
	<input id="file" name="photo" type="file" class="form-control" ></center>
			<script>
$("#file").change(function () {
    filePreview(this);
});
</script>
</div>

<div class="form-group"><center>
<p class="text-muted">Sube una fotografia de tu rostro</p></center>

</div>
</div>