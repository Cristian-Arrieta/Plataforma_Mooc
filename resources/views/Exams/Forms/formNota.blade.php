<div class="form-group">
	{{ Form::label('nota','Nota del Examen') }}
	{{ Form::text('nota',null ,['class' => 'form-control'])}}
</div>

@can('curso.inscripcion')
<div class="form-group">
	{{ Form::label('nota','Nota del Examen : '. $exam->nota) }}
</div>
@endcan
