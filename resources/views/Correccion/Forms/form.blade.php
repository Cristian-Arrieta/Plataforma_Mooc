<div class="form-group">
	{{ Form::label('name','Nombre del Examen') }}
	{{ Form::text('name',null ,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('description','Descripcion del Examen') }}
	{{ Form::text('description',null ,['class' => 'form-control'])}}
</div>



<h3>Tipo de Examen</h3>

<div class="form-group">
	<ul class="list-unstyled">
		
			<li>
				
            <div class="custom-control custom-radio">
			
			<input class="form-check-input" type="radio" name="tipo" value="Cuestionario" 
			
			@if(($exam->tipo == 'Cuestionario')&&($exam != null))
                 checked						  
				
				@endif
				>
			<label class="form-check-label" for="exampleRadios1">Cuestionario</label>
			<br>
			<input class="form-check-input" type="radio" name="tipo" value="Practico"
			@if(($exam->tipo == 'Practico')&&($exam != null))
                 checked						  
				
				@endif
				>			
			
			<label class="form-check-label" for="exampleRadios1">Practico</label>
			
            </div>
            
			</li>
	
	</ul>
</div>

<div class="form-group">
	{{ Form::label('urlVideo','Url del Examen') }}
	{{ Form::text('urlVideo',null ,['class' => 'form-control'])}}
</div>

<div class="form-group">

	
	<a href="{{route('preguntas.index',$exam->id)}}" class="btn btn-secondary">
	Ver Preguntas
	</a>
</div>		
