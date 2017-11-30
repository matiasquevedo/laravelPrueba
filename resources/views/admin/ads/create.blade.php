@extends('admin.template.main')


@section('title', 'Nuevo Publicidad')

@section('content')

	@if(count($errors)>0)

		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

					<li>
						{{ $error}}
					</li>

				@endforeach
			</ul>
			

		</div>
		
	@endif

	<div class="container">

		<div>
			<h3>Nuevo Publicidad</h3>
		</div>

		{!! Form::open(['route'=>'ads.store', 'method'=>'POST','files'=>'true']) !!}

		<div class="row">
  			<div class="col-md-6">
				<div class="form-group">
				{!! Form::label('cliente','Cliente*') !!}
				{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Cliente','required']) !!}  
				</div>
		

				<div class="form-group">
				{!! Form::label('title','Descripcion') !!}
				{!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Descripción','required']) !!}  
				</div>

				

						

						
			</div>

			<div class="col-md-6">
				<div class="form-group">
				{!! Form::label('precioConvenido','Precio convenido') !!}>
				{!! Form::number('precio',null,['class'=>'form-control','step' => 'any','placeholder'=>'$0.00','required']) !!}  
				</div>

				<div class="form-group">
				{!! Form::label('periodoPublicidad','Periodo de Publicidad') !!}
				{!! Form::number('periodo',null,['class'=>'form-control','placeholder'=>'meses','required']) !!}  
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('Ubicacion','Ubicacion*') !!} <br>
							{!! Form::select('ubicacion', array('0' => 'Pagina Princial', '1' => 'Noticias Especificas','2' => 'Notificaciones'), null,['class'=>'form-control select-tag','multiple','required']) !!} 
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('category','Categoria') !!}
						{!! Form::select('category',array('0' => 'Paquete 1', '1' => 'Paquete 2','2' => 'Paquete 3'),null,['class'=>'form-control select-category','required']) !!}
						</div>
					</div>
				</div>

				<div class="form-group">
				{!! Form::label('image','Imagen de Promocion*') !!}
				{!! Form::file('image',['id'=>'upload','name'=>'image']) !!}
				</div>
				
			</div>
		</div>	

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>

@endsection

@section('js')
	<script>

		$('.select-tag').chosen({
			placeholder_text_multiple:'Ubicacion de Publicidad',
			search_contains:true,

		});

		$('.select-category').chosen({
			placeholder_text_multiple:'Paquete Publicitario',
			search_contains:true,

		});

		$('#texto').trumbowyg();

		document.getElementById("upload").onchange = function() {
			var reader = new FileReader(); //instanciamos el objeto de la api FileReader

  			reader.onload = function(e) {
    		document.getElementById("image").src = e.target.result;
  			};

  		// read the image file as a data URL.
  		reader.readAsDataURL(this.files[0]);
		};

		function limite_textarea(valor) {   
    		total = valor.length;
        	document.getElementById('cont').innerHTML = total;
		}

		

		
	</script>

@endsection
