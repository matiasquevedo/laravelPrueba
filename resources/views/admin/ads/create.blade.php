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

		<div>
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('title','Nombre*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'nombre','required']) !!}  
				</div>

				<div class="form-group">
				{!! Form::label('title','precio*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::number('precio',null,['class'=>'form-control','placeholder'=>'nombre','required']) !!}  
				</div>
				<div class="form-group">
				{!! Form::label('title','Periodo*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::number('periodo',null,['class'=>'form-control','placeholder'=>'nombre','required']) !!}  
				</div>
				<div class="form-group">
				{!! Form::label('title','image*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('image',null,['class'=>'form-control','placeholder'=>'nombre','required']) !!}  
				</div>

				<div class="form-group">
				{!! Form::label('title','image*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('description',null,['class'=>'form-control','placeholder'=>'nombre','required']) !!}  
				</div>
			</div>
		</div>	

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>

	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nuevo Tag</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['route'=>'tags.moda.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('name','Nombre Tag') !!}
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
      
    </div>
  </div>
	
	

@endsection

