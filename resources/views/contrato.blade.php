<html>
	<head>
		<title>
			{{$ad->name}}
		</title>
	</head>
	<body>
		<h1>hola</h1>
		{{$ad->id}}
		<div class="row">
        <div class="col-md-8">
          
          <h4>{{$ad->description}}</h4>

        </div>
        <div class="col-md-4">
          <h3>Precio de Paquete: {{$ad->precio}}</h3>
          <h3>Periodo: {{$ad->periodo}}</h3> 

        </div>
      </div>
	</body>
</html>


