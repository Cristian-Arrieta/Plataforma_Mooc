
@if($ex->tipo == 'Cuestionario')

	<div class="form-group">
		<ul class="list-unstyled">{{ Form::hidden($n = 1,$resp = 'resp'. $n) }}
			@foreach($preguntas as $pregunta)
			<label> {{$pregunta->pregunta }}</label><br>
			<label> Respuesta =>   " {{$exam->$resp }} "</label>
			{{ Form::hidden($n = $n + 1 , $resp = 'resp'. $n) }}
			<br>
			@endforeach
			
		</ul>
	</div>		
@else	
	<div class="form-group">
	{{ Form::label('urlVideo','Practico : ') }}
		<a 
		
		@if($exam->urlPract == null)
			href="#"
		@else
			href="{{route('User_exam.desc',$exam->id)}}" 
		@endif
		
		class="btn btn-sm btn-outline-info">
		
				Descargar</a>
				
	</div>	
	
@endif		