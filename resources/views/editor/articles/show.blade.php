@extends('editor.template.main')


@section('title', 'Ver Articulo' )

@section('content')

	<div class="container-fluid">
  		<h3>{{$article->title}} 
  		@if($article->state == '0')
			<span class="label label-danger">Sin Publicar</span>
      <div class="btn btn-default"><a href="{{ route('editor.articles.edit',$article->id)}}">Editar</a></div>
		@else
			<span class="label label-success">Publicada</span>
  		@endif
      
  		</h3>
      
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