<h3>Lista de Categorias</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($categorias as $categoria)
			<li>
				<label>
					{{ Form::radio('categorias',$categoria->id) }}
					{{ $categoria->name }}
					<em>{{ $categoria->description ?: 'N/A'}}</em>
				</label>
			</li>
		@endforeach
	</ul>
</div>