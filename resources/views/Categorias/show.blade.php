@extends('layouts.app')

@section('content')
<div class="container full-height">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categoria</div>

                <div class="card-body">
					<p><strong>Nombre : </strong>{{$categoria->name}}</p>
					<p><strong>Descripcion : </strong>{{$categoria->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
