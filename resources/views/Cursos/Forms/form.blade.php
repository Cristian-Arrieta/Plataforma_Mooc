<div class="form-group">
	{{ Form::label('name','Nombre del Curso')}}
	{{ Form::text('name',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('description','Descripcion del Curso') }}
	{{ Form::textarea('description',null,['class' => 'form-control']) }}
</div>

<h3>Tipo de Curso</h3>
<div class="form-group">
	<ul class="list-unstyled">
		<li>				
            <div class="custom-control custom-radio">
			
				<input class="form-check-input" type="radio" name="tipo" value="Masivo">
				<label class="form-check-label" for="exampleRadios1">Masivo</label>
				
				<br>
				<input class="form-check-input" type="radio" name="tipo" value="Preferencial">			
				
				<label class="form-check-label" for="exampleRadios1">Preferencial</label>
			
            </div>            
		</li>
	
	</ul>
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

