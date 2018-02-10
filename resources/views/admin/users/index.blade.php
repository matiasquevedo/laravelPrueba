@extends('admin.template.main')


@section('title', 'Lista de Usuarios')

@section('content')



<div class="row">
  <div class="col-md-1">
  	
  	<a href="{{ route('users.create')}}" class="btn btn-info">Nuevo</a>

  </div>
  {{$users}}
  <div class="col-md-10">

  		<table class="table table-striped">
  <thead>
    <tr>
      <th>#Id</th>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>
	@if(empty($users))
		<tr>
			<td></td>
			<td>No hay usuarios para Mostrar</td>
			<td></td>
			<td></td>
		</tr>
	@else
		@foreach($users as $user)
		<tr>
			<td>{{$user->id}}</td>
			<td>{{$user->name}}</td>
      <td>
      @if($user->name == "Matias Quevedo")
        <span class="text-center" style="font-size: 50px;"><img src="/images/jesus.svg" alt="" width="20%"></span>
      @else 
        @if($user->type == "member")
          <span class="label label-success">{{ $user->type }}</span>
        @else
          <span class="label label-info">{{$user->type}}</span>
        @endif
      @endif
      </td>
      <td>
      @if($user->name == "Matias Quevedo")
      @else 
      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
      @endif
      </td>
		</tr>


  		@endforeach
  

	@endif

  	
  </tbody>
</table>
{!! $users->render() !!}  	

  </div>
  <div class="col-md-1">
  	
  	

  </div>
</div>



@endsection