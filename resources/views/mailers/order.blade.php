<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<img style="width: 20%;" class="imglog brand-logo" src="{{asset('img/logo.jpg')}}">
	<h1 style="color: purple;">Hola! Gracias por comprar en American Boats de Valle de Bravo</h1>
	<h3>En la empresa American Boats garantizamos un buen envio de sus productos </h3>
	@foreach ($nuevo as $nuevo )
	<h2>{{$nuevo->title}}</h2>
	@endforeach
</body>
</html>