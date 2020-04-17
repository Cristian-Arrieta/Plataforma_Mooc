@extends('layouts.app')

    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
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
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
					Curso
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
					{!!Form::model($curso,['route' => ['cursos.update',$curso->id],'files' => true,
					'method'=>'PUT']) !!}
						@include('cursos.forms.form2')
						@include('cursos.forms.formFin')
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('miScript')
 <script>
$("#file").change(function () {
    filePreview(this);
});
</script>
 <script src="{{ asset('js/miScript.js') }}" ></script>

@endsection
