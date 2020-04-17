@extends('layouts.app')
<script>
	function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
			
            document.getElementById('uploadForm').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
					Usuario
				</div>
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
                <div class="card-body">
					{!!Form::model($user,['route' =>['users.perfil_update',$user->id],'files' => true,
					'method'=>'PUT'])!!}
						@include('users.forms.formData')
						@include('users.forms.formFin')
					{!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
