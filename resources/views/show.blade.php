@extends('welcome')


@section('title', 'Lista de Articulos')

@section('content')
	<div class="container-fluid">
  		<h3>{{$article->title}}</h3>
  		{{$article->category->name}}

  		<div class="panel panel-default">
  			<div class="panel-body" id="content">
  				
          <div>

  					{!!$article->content!!}  					
  				
          </div>

  				<div>
  					<div>
  						<h4>Imagen de Portada</h4>
  					</div>
  					<div>
  						<img src="/images/articles/{{$image}}" alt="">
  					</div>
  				</div>
  				
  			</div>
		</div>
	</div>
@endsection