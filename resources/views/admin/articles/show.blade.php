@extends('admin.template.main')


@section('title', 'Lista de Articulos')

@section('content')
  <div>
    <ol class="breadcrumb">
      <li><a href="{{ route('categories.show',$article->category->id)}}">{{$article->category->name}}</a></li>
    </ol>
    <div>
      {{$article->created_at}}
    </div>

    <div>
      {{$article->update_at}}
    </div>
  </div>

  <div>
    <div class="cambiar-portada">                      
      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"><i class="far fa-edit"></i>
      </button>
    </div>
    <img src="/images/articles/{{$image}}" width="500">
  </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle"> Nueva Imagen de Portada </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div>
            {!! Form::open(['route'=>'images.update', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
            {{csrf_field()}}

            <div class="form-group" style="display: none">
            {!!Form::text('article_id',$article->id,null,['class'=>'form-control','required']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('image','Imagen de Portada*') !!}
            {!! Form::file('image',['id'=>'upload','name'=>'image']) !!}
            </div>

            <div class="preview">
              <img id="image" width="400" height="400">
            </div><br>

            <div class="form-group">
              {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!} 
          </div>
        </div>
      </div>
    </div>
  </div>

	<div class="container-fluid">
  		<h3>{{$article->title}} 
  		@if($article->state == '0')
			<span class="label label-danger">Sin Publicar</span>
			<div class="btn btn-default"><a href="{{ route('articles.post',$article->id)}}">Publicar</a></div>
		@else
			<span class="label label-success">Publicada</span>
			<div class="btn btn-default"><a href="{{ route('articles.undpost',$article->id)}}">No Publicar</a></div>
  		@endif
  		</h3>

      <div>
              {!!$article->volanta!!}
      </div>


  		<div class="panel panel-default">
  			<div class="panel-body" id="content">
  				
            <div>

              <div>
                <h4>{!!$article->bajada!!}</h4>
              </div>
              
    					{!!$article->content!!}  					
    				
            </div>
            <div>
              <div>
                <h3>Fuente: {!!$article->fuente!!}</h3>
              </div>
            </div>
  			</div>
  				
  		</div>
		</div>
	</div>
@endsection