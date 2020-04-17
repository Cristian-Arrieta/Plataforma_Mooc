<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
		body {background-position: center;
		font-size: 20px;
		background-image: url({{asset('img/users/Miskatonic_Fondo2.png')}});
		  background-size:500px 500px,
                       700px 500px;
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-color:#F4F4F4;
		 background-position: center;
		}
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 30px;
		
        }
        #primero{
       
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }

		
		
    </style>
    </head>
    <body>
        
			<div >
				<img src="{{asset('img/users/Miskatonic_Univ.png')}}" alt="Tu imgen de perfil" width="100" height="100" style="position:absolute;top:0px;right:0px;">
			
				<img src="{{asset('img/users/univ_Miskatonic2.png')}}" alt="Tu imgen de perfil" width="100" height="100" style="top:0px;left:0px;">				
				
			</div>
			<span >
		<h1>Certificado de Curso Completado</h1>
		</span>
        <hr>
        <div  class="contenido">
			
				<p id="primero">La Universidad de Miskatonic fundad por " Howard Phillips Lovecraft " en año 1960 se enorgullece en certificar al Alumno "{{$user->name . ' ' . $user->lastname}}" tras completar satisfactoriamente el Curso de "{{$curso->name}}" </p>
			
        </div>
		
		<img src="{{asset('img/users/Firma2.png')}}" alt="Tu imgen de perfil" width="200" height="150" style="position:absolute;right:150px;">		
		<p id="primero" style="position:absolute;right:320px">Firma del Directivo</p>
		
		<p id="primero" style="position:absolute; bottom:10px; right:10px">{{$cert->fecha}}</p>
		<br>
		<p id="primero" style="position:absolute; bottom:10px; right:10px">COD:{{$cert->codigo}}</p>
    </body>
</html>