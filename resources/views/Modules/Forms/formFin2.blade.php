<h3>Estado del Modulo</h3>
<div class="form-group">
	<ul class="list-unstyled">		
		<li>			
            <div class="custom-control custom-radio">			
				<input class="form-check-input" type="radio" name="state" value="Oculto" 
				
				@if($module->state == 'Oculto'))
					 checked						  
					
					@endif
					>
					<label class="form-check-label" for="exampleRadios1">Oculto</label>
					<br>
					<input class="form-check-input" type="radio" name="state" value="Visible"
					@if($module->state == 'Visible')
					 checked						  
					
					@endif
					
					>			
				
				<label class="form-check-label" for="exampleRadios1">Visible</label>			
            </div>            
		</li>	
	</ul>
</div>

<div class="form-group">
	{{ Form::submit('Guardar',['class' => 'btn  btn-primary']) }}
	
</div>

<div class="form-group">
<a href="{{route('modules.index',$module->cursos[0])}}" class="btn btn-outline-info">Indice</a>
</div>