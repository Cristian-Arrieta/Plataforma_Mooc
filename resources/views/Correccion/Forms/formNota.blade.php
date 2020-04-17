@can('cursos.edit')
<div class="form-group">
{{ Form::label('name','Elige una Nota : ')}}
	<select name="nota"> 
	@for ($i = 0 ; $i < 11 ; $i++)   
		@if(($exam->nota != null)&&($exam->nota == $i))
			<option selected value ="{{$i}}">{{$i}}</option>  	
		@else
			<option  value ="{{$i}}">{{$i}}</option>
		@endif
		
	@endfor	
</select>
	
</div>


@endcan
@can('cursos.inscripcion')
<div class="form-group">
	{{ Form::label('nota','Nota del Examen : '. $exam->nota) }}
</div>
@endcan
