@extends('welcome')


@section('title', 'Lista de Articulos')

@section('content')
<!-- 	<div class="container-fluid">
  		<h3>{{$article->title}}</h3>
  		{{$article->category->name}}

  		<div class="panel panel-default">
  			<div class="panel-body" id="content">
  				
          <div>

  					{!!$article->content!!}  					
  				
          </div>

  				<div>
  					<div>
  						<img src="/images/articles/{{$image}}" alt="">
  					</div>
  				</div>
  				
  			</div>
		</div>
	</div> -->

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <img src="/images/articles/{{$image}}" alt="">
      <h1>{{$article->title}}</h1>
      {{$article->category->name}}
    </div>
    <div class="col-md-4">
      <img src="/images/play.png" alt="" width="80%">
    </div>
  </div>
</div>


@endsection