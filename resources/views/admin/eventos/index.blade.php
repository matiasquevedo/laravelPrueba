@extends('admin.template.main')


@section('title', 'Eventos')

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

	<a href="{{ route('admin.eventos.create')}}" class="btn btn-info">Nuevo</a>

	

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#Id</th>
						<th>Titulo</th>
						<th>Estado</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
	@foreach($eventos as $evento)
					<tr>
						<td>{{$evento->id}}</td>
      					<td> <a href="{{ route('admin.eventos.show', $evento->id) }}">{{$evento->title}}</a></td>
           				<td>
        					@if($evento->state == "0")
          					<span class="label label-danger">Sin Publicar</span>
       						@else
          					<span class="label label-success">Publicada</span>
       						 @endif

      					</td>
      					<td><a href="{{ route('admin.eventos.edit', $evento->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('admin.eventos.destroy', $evento->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
	@endforeach	
				</tbody>
				


			</table>
			
				
					
				
		</div>
		<div class="col-md-1"></div>
	</div>
@endsection