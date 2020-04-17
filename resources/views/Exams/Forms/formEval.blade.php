
@if($exam->tipo == 'Cuestionario')
	
	<div class="form-group">
		<ul class="list-unstyled">{{ Form::hidden($n = 1,$resp = 'resp'. $n) }}
			@foreach($preguntas as $pregunta)
			<label> {{$pregunta->pregunta }}</label><br>
			<label> {{$exam }}</label>
			{{ Form::hidden($n = $n + 1 , $resp = 'resp'. $n) }}
			@endforeach
		</ul>
	</div>		
@endif			
<div class="form-group">
	{{ Form::label('urlVideo','Url del Examen') }}
	{{ Form::text('urlVideo',null ,['class' => 'form-control'])}}
</div>

