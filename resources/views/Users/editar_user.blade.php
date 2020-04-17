@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario</div>
						@if($errors->any())
							<div class="alert alert-danger">
								<h5>Por favor completar correctamente los siguientes Campos</h5>
								<ul>
								@foreach($errors->all() as $error)
									
										<li>{{$error}}</li>
									
								@endforeach
								</ul>
							</div>
						@endif	
				
					<DIV class="card-body d-flex justify-content-between align-items-end mb-2">


						<form class="needs-validation" novalidate method="POST" action ="{{route('update_usuario',[$usuario])}}" >
							{!! csrf_field() !!} <!--token-->
							{{ method_field('PUT') }}
						  <div class="form-row">
							<div class="col-md-4 mb-3">
							  <label for="validationCustom01">First name</label>
							  <input name='nombre' type="text" class="form-control" id="validationCustom01" placeholder="First name" value="{{$usuario->nombre}}" required>
							  <div class="valid-feedback">
								Looks good!
							  </div>
							</div>
							<div class="col-md-4 mb-3">
							  <label for="validationCustom02">Last name</label>
							  <input name='apellido' type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="{{$usuario->apellido}}" required>
							  <div class="valid-feedback">
								Looks good!
							  </div>
							</div>
							<div class="col-md-4 mb-3">
							  <label for="validationCustomUsername">Email</label>
							  <div class="input-group">
								<div class="input-group-prepend">
								  <span class="input-group-text" id="inputGroupPrepend">@</span>
								</div>
								<input name='email' type="text" class="form-control" id="validationCustomUsername" placeholder="Email" aria-describedby="inputGroupPrepend" required value="{{$usuario->email}}">
								<div class="invalid-feedback">
								  Please choose a Email.
								</div>
							  </div>
							</div>
						  </div>
						  <div class="form-row">
							<div class="col-md-6 mb-3">
							  <label for="validationCustom03">DNI</label>
							  <input name='dni' type="text" class="form-control" id="validationCustom03" placeholder="DNI" required value="{{$usuario->dni}}">
							  <div class="invalid-feedback">
								Please provide a valid DNI.
							  </div>
							</div>
							<div class="col-md-6 mb-3">
							  <label for="validationCustom04">Password</label>
							  <input name='password' type="text" class="form-control" id="validationCustom04" placeholder="Password" required>
							  <div class="invalid-feedback">
								Please provide a valid Password.
							  </div>
							</div>
							
						  </div>

						  
						  <button class="btn btn-primary" type="submit">Submit form</button>
						</form>

						
						<script>/*
						// Example starter JavaScript for disabling form submissions if there are invalid fields
						(function() {
						  'use strict';
						  window.addEventListener('load', function() {
							// Fetch all the forms we want to apply custom Bootstrap validation styles to
							var forms = document.getElementsByClassName('needs-validation');
							// Loop over them and prevent submission
							var validation = Array.prototype.filter.call(forms, function(form) {
							  form.addEventListener('submit', function(event) {
								if (form.checkValidity() === false) {
								  event.preventDefault();
								  event.stopPropagation();
								}
								form.classList.add('was-validated');
							  }, false);
							});
						  }, false);
						})();*/
						</script> 
					</div>
					
            </div>
        </div>
    </div>
</div>
@endsection
