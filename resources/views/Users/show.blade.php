@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-end mb-2">
					Usuario
				</div>
                <div class="card-body">
				
					<p><strong>Nombre : </strong>{{$user->name}}</p>
					<p><strong>Apellido : </strong>{{$user->lastname}}</p>
					<p><strong>DNI : </strong>{{$user->name}}</p>
					<p><strong>Email : </strong>{{$user->email}}</p>
					<center>
					<!--	<img src="data:image/jpg; base64 , {{($user->getPhotoRouteAttribute())}} " alt="Tu imgen de perfil" width="300" height="400"> -->
						<img src="{{($user->getPhotoRouteAttribute())}} " alt="Tu imgen de perfil" width="300" height="400">
					</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
