
<br >
<div class="form-group">
	<a href="{{route('temas.index',$module->id)}}" class="btn btn-secondary">
		Ver Temas
	</a>
</div>
@can('cursos.edit')
<div class="form-group">
	<a href="{{route('exams.show',$module->id)}}" class="btn btn-secondary">
		Modelo de Examen
	</a>
</div>

<div class="form-group">
	<a href="{{route('User_exam.index',$module->id)}}" class="btn btn-secondary">
		Ver Examenes
	</a>
</div>
@endcan

@can('cursos.inscripcion')
<div class="form-group">
	<a href="{{route('exams.rendir',$module->id)}}" class="btn btn-secondary">
		Rendir Examen
	</a>
</div>
@endcan