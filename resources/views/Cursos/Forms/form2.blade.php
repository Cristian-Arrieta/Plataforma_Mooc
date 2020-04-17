<div class="form-group">
	{{ Form::label('name','Nombre del Curso')}}
	{{ Form::text('name',null,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('description','Descripcion del Curso') }}
	{{ Form::textarea('description',null,['class' => 'form-control']) }}
</div>

<div class="form-group">
	{{ Form::label('video','Url del Video') }}
	{{ Form::text('video',null,['class' => 'form-control']) }}
</div>

<p class="text-muted"> *Ejmp : "https://www.youtube.com/embed/etc..." </p></center>

<div class="form-group">
	<label for="validationCustom04">Portada del Curso</label>
	<center>
	
		<img id="uploadForm" src="{{($curso->getPhotoRouteAttribute())}} " alt="Portada del Curso" width ="100%"   height = "500 %"  position ="fixed">
	</center>
</div>

<div class="col-md-10 mb-3">
<div class="form-group"><center>
	<input  id="file"  name="imagen" type="file" class="form-control" >
	</center>
		<script>
$("#file").change(function () {
    filePreview(this);
});
</script>
</div>

<div class="form-group"><center>
<p class="text-muted">Sube una Imagen para la Portada del Curso </p></center>

</div>
</div>

<h3>Tipo de Curso</h3>
<div class="form-group">
	<ul class="list-unstyled">		
		<li>				
            <div class="custom-control custom-radio">			
				<input class="form-check-input" type="radio" name="tipo" value="Masivo" 
				
				@if($curso->tipo == 'Masivo'))
					 checked						  
					
					@endif
					>
					<label class="form-check-label" for="exampleRadios1">Masivo</label>
					<br>
					<input class="form-check-input" type="radio" name="tipo" value="Preferencial"
					@if($curso->tipo == 'Preferencial')
					 checked						  
					
					@endif
					>			
				
				<label class="form-check-label" for="exampleRadios1">Preferencial</label>			
            </div>            
		</li>	
	</ul>
</div>
<br>
<p class="text-muted"> * Los valores de los campos ("Cupo" , "Fecha Inicio" y "Fecha Fin") solo se aplican a los CURSOS de tipo "Preferencial"</p></center>
<hr noshade="noshade" />



<h3>Cupo del Curso</h3>
<div class="form-group">
	<select name="cupo"> 
	@for ($i = 0 ; $i < 51 ; $i++)   
		@if(($curso->cupo != null)&&($curso->cupo == $i))
			<option selected value ="{{$i}}">{{$i}}</option>  	
		@else
			<option  value ="{{$i}}">{{$i}}</option>
		@endif		
	@endfor	
	</select>	
	
</div>


<h3>Fecha de Inicio del Curso</h3>
<div class="form-group">
	<input type="text" class="form-control datepicker" name="inicio" 
	@if($curso->inicio != null)
	value="{{ $today = (new \DateTime($curso->inicio))->format('Y-m-d')}}"
	@endif
	>  
</div>

<h3>Fecha de Fin del Curso</h3>
<div class="form-group">
	<input type="text" class="form-control datepicker" name="fin"  
	@if($curso->fin != null)
	value="{{ $today = (new \DateTime($curso->fin))->format('Y-m-d')}}"
	@endif
	>
</div>

<hr noshade="noshade" />

<h3>Lista de Categorias</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($categorias as $categoria)
			<li>
				
            <div class="custom-control custom-radio">
			<input class="form-check-input" type="radio" name="categoria" value="{{$categoria->id}}"
			@if (!empty($curso->categorias[0]))
				@if(($categoria->id == $curso->categorias[0]->id)&&($curso != null))
					
                 checked						  
				
				@endif
			@endif	
				><label class="form-check-label" for="exampleRadios1">
									{{$categoria->name}}
								  </label>
            </div>
            
			</li>
		@endforeach
	</ul>
</div>


<div class="form-group">
	<h3 style="">Modulos</h3>
	<a href="{{route('modules.index',$curso->id)}}" class="btn btn-primary">
	Ver Modulos
	</a>
</div>										
@can ('cursos.create')
<h3>Lista de Profesores</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($profesores as $user)
			<li>
				<label>
					{{ Form::checkbox('users[]',$user->id) }}
					{{ $user->name }}
				</label>
			</li>
		@endforeach
	</ul>
</div>

@endcan

<h3>Lista de Alumnos</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($alumnos as $user)
			<li>
				<label>
					{{ Form::checkbox('users[]',$user->id,null) }}
					{{ $user->name }}
				</label>
			</li>
		@endforeach
	</ul>
</div>

