@extends('admin.template.main')


@section('title', 'Inicio')

@section('content')

<div class="container">
    <div class="pins">
      

    @foreach($articles as $article)
    @if($article->state == "0")
    <div style="background-color: #ffa6a4 !important" class="pin">
    	<div>
    		<div>
    			<a href="{{ route('articles.show', $article->id) }}"><h1>{{$article->title}}</h1></a>
    			<h3>{{$article->bajada}}</h3>
    			<p>{{$article->volanta}}</p>
    			<div class="row">
    				<div class="col-md-8"></div>
    				<div class="col-md-4"></div>
    			</div>
    			
    		</div>
    	</div>
    </div>
    @else

    <div style="background-color: #81ff81 !important" class="pin">
    	<div>
    		<div>
    			<a href="{{ route('articles.show', $article->id) }}"><h1>{{$article->title}}</h1></a>
    			<h3>{{$article->bajada}}</h3>
    			<p>{{$article->volanta}}</p>
    			<div class="row">
    				<div class="col-md-8"></div>
    				<div class="col-md-4"></div>
    			</div>
    			
    		</div>
    	</div>
    </div>

    @endif

    
    @endforeach
{!! $articles->render() !!}   

  </div>
</div>

@endsection