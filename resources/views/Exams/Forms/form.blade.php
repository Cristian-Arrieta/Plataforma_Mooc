<div class="form-group">
	{{ Form::label('name','Nombre del Examen') }}
	{{ Form::text('name',null ,['class' => 'form-control'])}}
</div>
<div class="form-group">
	{{ Form::label('description','Descripcion del Examen') }}
	{{ Form::textarea('description',null ,['class' => 'form-control'])}}
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
	
<hr noshade="noshade" />


<p class="text-muted">*Solo si el Examen es de Tipo "Practico" </p></center>
<div class="col-md-10 mb-3">
	<div class="form-group"><center>
		<input name="practico" type="file" class="form-control"></center>
	</div>

	<div class="form-group"><center>
	<p class="text-muted">Sube una Pratico con formato ".PDF .Doc .Docx"</p></center>

	</div>
</div>

	
<hr noshade="noshade" />

<div class="form-group">

	
	<a href="{{route('preguntas.index',$exam->id)}}" class="btn btn-secondary">
	Ver Preguntas
	</a>
</div>		
