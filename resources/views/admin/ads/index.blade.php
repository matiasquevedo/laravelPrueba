@extends('admin.template.main')


@section('title', 'Publicidad')

@section('content')



<div class="row">
  <div class="col-md-1">
  	
  	<a href="{{ route('categories.create')}}" class="btn btn-info">Nuevo</a>

  </div>
  <div class="col-md-10">

  		<table class="table table-striped">
  <thead>
    <tr>
      <th>#Id</th>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Periodo</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($ads as $ad)
		<tr>
			<td>{{$ad->id}}</td>
			<td><a href="{{ route('ads.show', $ad->id) }}">{{$ad->name}}</a></td>
      <td>{{$ad->precio}}</td>
      <td>{{$ad->periodo}}</td>
      <td>{{$ad->user->name}}</td>
			<td><a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('ads.destroy', $ad->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>


  	@endforeach
  
  </tbody>
</table>
{!! $ads->render() !!}  	

  </div>
  <div class="col-md-1">
  	<h3>Total de Publicidad mes</h3>  
    <h3>{{$total}}</h3>	

  </div>
</div>



@endsection