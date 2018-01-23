<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css"> -->
		<title>
			{{$ad->name}}
		</title>
    <style>
    <?php include(public_path().'/plugins/bootstrap/css/bootstrap.css');?>
    </style>
	</head>
	<body>
		<h1 class="text-center">CONTRATO DE PUBLICIDAD</h1>
    <h2 class="text-center">PARA LA APARICIÓN EN APLICACIÓN DIARIO DIGITAL / WEB DIARIO DIGITAL / REDES SOCIALES DIARIO DIGITAL</h2>
    <table class="table table-striped">
        <tr>
          <th>Razón Social / Nombre</th>
          <td>{{$datos['razonsocial']}}</td>
        </tr>
        <tr>
          <th>Responsable</th>
          <td>{{$datos['responsable']}}</td>
        </tr>
        <tr>
          <th>DNI</th>
          <td>{{$datos['dni']}}</td>
        </tr>
        <tr>
          <th>Cargo</th>
          <td>{{$datos['cargo']}}</td>
        </tr>        
        <tr>
          <th>Email</th>
          <td>{{$datos['email']}}</td>
        </tr>
        <tr>
          <th>Código Postal</th>
          <td>{{$datos['cp']}}</td>
        </tr>
        <tr>
          <th>Telefono</th>
          <td>{{$datos['telefono']}}</td>
        </tr>
        <tr>
          <th>CUIL/CUIT/DNI</th>
          <td>{{$datos['cuilText']}}</td>
        </tr>
        <tr>
          <th>Rubro</th>
          <td>{{$datos['rubro']}}</td>
        </tr>        
        <tr>
          <th>Localidad</th>
          <td>{{$datos['localidad']}}</td>
        </tr>
    </table>

    <h3 class="text-center">CARACTERÍSTICAS DE LA PUBLICIDAD A CONTRATAR</h3>
    <h3>Contrato Puntual: Paquete N°:{{$datos['p']}}</h3>
    <p>{{$datos['paquete']}}</p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div>
      <div>
        <div class="text-justify"><p>En ________________, a __ de _________ de 20__ , lo que de conformidad conviene y otorga,
Manifiesta que está interesado en formalizar el presente contrato según las obligaciones y derechos expuestos en la segunda página del mismo; que posee suficientes poderes para su firma; que se reconoce capacidad legal necesaria para poder llevar a cabo la celebración; y declara expresamente que actúa de forma libre y voluntaria.</p></div>
      <br>
      <br>
      <br>
      <br>
      <br>

        <p class="text-right">FIRMA Y SELLO DE LA EMPRESA</p>
      </div>
    </div>
	</body>
</html>


