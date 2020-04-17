

@if($exam->tipo == 'Cuestionario')
	
	<div class="form-group">
		<ul class="list-unstyled">{{ Form::hidden($n = 1) }}
			@foreach($preguntas as $pregunta)
			<label> {{$pregunta->pregunta }}</label><br>
				
				<li>
					<div class="custom-control custom-radio">
			
					<input class="form-check-input" type="radio" name="{{'resp'. $n}}" value="{{$pregunta->opcion1}}">
					<label class="form-check-label" for="exampleRadios1">{{$pregunta->opcion1}}</label>
					<br>
					<input class="form-check-input" type="radio" name="{{'resp'. $n}}" value="{{$pregunta->opcion2}}">		
					<label class="form-check-label" for="exampleRadios1">{{$pregunta->opcion2}}</label>
					@if($pregunta->opcion3 != null)
						<br>
						<input class="form-check-input" type="radio" name="{{'resp'. $n}}" value="{{$pregunta->opcion3}}">			
						
						<label class="form-check-label" for="exampleRadios1">{{$pregunta->opcion3}}</label>
					@endif
					
					@if($pregunta->opcion4 != null)
						<br>
						<input class="form-check-input" type="radio" name="{{'resp'. $n}}" value="{{$pregunta->opcion4}}">			
						
						<label class="form-check-label" for="exampleRadios1">{{$pregunta->opcion4}}</label>
					@endif
					
					@if($pregunta->opcion5 != null)
						<br>
						<input class="form-check-input" type="radio" name="{{'resp'. $n}}" value="{{$pregunta->opcion5}}">			
						
						<label class="form-check-label" for="exampleRadios1">{{$pregunta->opcion5}}</label>
					@endif
					<br><br>
					</div>
				</li>
				{{ Form::hidden($n = $n + 1) }}
			@endforeach
		</ul>
	</div>

@else
	<div class="form-group">
		{{ Form::label('urlVideo','Url del Examen') }}
		{{ Form::text('urlVideo',null ,['class' => 'form-control'])}}
	</div>		
@endif



