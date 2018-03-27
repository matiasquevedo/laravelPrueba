@extends('editor.template.main')


@section('title', 'Documentación')

@section('content')
<div class="container">
	<h3 class="text-center">Documentación Brick Diario</h3>
	<h4>Uso de la Redacción Online

	</h4>
	<div>
		<p>La Redacción Online es una plataforma de desarrollo de articulos periodisticos que permite gestionar la creación de dichos articulos, edición, publicación y seguimiento, conectado al escritor con la aplicación movil.</p>
	</div>
	<div>
		<div class="btn-group" role="group" aria-label="...">
  			<a href="#usuarios" class="btn btn-danger">Usuarios</a>
  			<a href="#articulos" class="btn btn-info">Articulos</a>
  			<a href="#elementos" class="btn btn-warning">Elementos de un Articulo</a>
  			<a href="#nuevo" class="btn btn-success">Creando un Nuevo Articulo</a>

  			
		</div>
	</div>

	<div id="usuarios">
		<h4>Tipos de Usuarios</h4>
		<div>
		<p>Cada usuario de la plataforma tiene tareas específicas asignadas según su rol. Estos roles son:</p>
		<ul>
			<li>Editor: Puede crear nuevos articulos. Solo se le perminte editar y eliminar sus articulos.</li>
			<li>Eventista: Puede crear nuevos eventos. Solo se le perminte editar y eliminar sus eventos.</li>
			<li>Revisor: Puede crear nuevos articulos. Además se le permite revisar y editar los articulos de otros usuarios Editores. Puede eliminar solo sus articulos.</li>
			<li>Administrador: Puede ver todos los articulos y es el encargado de publicar los articulos.</li>
		</ul>
		</div>
	</div>
	<div id="articulos">
		<h4>Articulos</h4>
		<div>
		<p>Cambiando el paradigma de diario convencional (impreso en papel), Brick generaliza el concepto de articulo, abarcando todos los generos periodisticos. Un articulo de Brick puede ser una noticia,un reportaje, una cronica, articulo de opinion, editorial, etc. Los articulos son los elementos principales de Brick. Son el contenido y el porque de usar la aplicación movil.
Gracias a este cambio de paradigma, un articulo no es solo el relato escrito de un hecho de actualidad. En Brick los articulos pueden incluir audio, imagenes, videos, links, publicaciones de redes sociales, botones, mapas interactivos, etc, permitiendo el desarrollo de contenido atractivo y de calidad.</p>
		</div>
	</div>

	<div id="elementos">
		<h4>Elementos de un Articulo</h4>
		<div>
		<p>Los articulos de Brick cuentan de siete elementos obligatorios que deben cumplir algunas condiciones:
		</p>
		<p><b>Título:</b> Es un campo obligatorio y debe ser atractivo e interesante, de al menos 8 caracteres.</p>
		<p><b>Bajada:</b> Se encuentra debajo del titulo y debe resumir los aspectos mas importantes del articulo. Es obligatorio y de al menos 30 caracteres.</p>
		<p><b>Volanta:</b>Volanta: Complementa al titulo, anticipando información. Es obligatorio y de al menos 8 caracteres.</p>
		<p><b>Contenido:</b> Este campo expone la informacion completa, desarrollando de mayor a menor importancia. Permite utilizar distintos formatos (alineaciones, viñetas, listas, negritas, etc) y recursos multimedia (imagen, audio, video). Es obligatorio y de almenos 280 caracteres.</p>
		<p><b>Categoria:</b> Las categorias discriminan los elementos por su contenido. Cada articulo perteneces a solo una categoria. </p>
		<p><b>Fuente:</b>  es cualquier elemento externo al editor, que provee datos e información para el desarrollo del articulo. Tambien adopta un nuevo paradigma, pudiendo ser fuentes periodisticas otros periodicos digitales, blogs, videos, infografias. Un articulo puede incluir un numero ilimitado de fuentes, las cuales todas deben ser citadas.</p>
		<p><b>Imagen de Portada:</b> Es la imagen relacionada al articulo, extremadamente importanten en la aplicación movil. Es obligatorio incluir dicha imagen y debe respetar la propiedad intelectual.</p>
		</div>
	</div>

	<div id="nuevo">
		<h4>Creando un Nuevo Articulo</h4>
		
	</div>



</div>

@endsection