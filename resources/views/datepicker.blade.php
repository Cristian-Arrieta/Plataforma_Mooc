@extends('layouts.app')
   
    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tema</div>

                <div class="card-body">
					{!! Form::open(['route' => ['save-date']]) !!}
                   
                        <label for="date">Fecha</label>
                        <input type="text" class="form-control datepicker" name="date">  


 <br>
                        <button type="submit" class="btn btn-default btn-primary">Enviar</button>
						
					{!! Form::close() !!}
 
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('miScript')
 <script src="{{ asset('js/miScript.js') }}" defer></script>
@endsection