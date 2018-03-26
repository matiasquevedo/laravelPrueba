<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great
|
*/

/////////////////////////////////////////////////
/////////////////////////////////////////////////
/*NUEVA RUTA: brickdiario.com*/
/////////////////////////////////////////////////
/////////////////////////////////////////////////

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){

	Route::get('/',function(){
		return view('admin.index');
	})->name('admin.inicio');

	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses'=>'UsersController@destroy',
		'as'=>'users.destroy'
	]);

	Route::get('users/conectados',[
		'uses'=>'UsersController@kk',
		'as'=>'users.conectados'
	]);

	Route::resource('categories','CategoriesController');
	Route::get('categories/{id}/destroy',[
		'uses'=>'CategoriesController@destroy',
		'as'=>'categories.destroy'
	]);

	//tags
	Route::resource('tags','TagsController');
	Route::get('tags/{id}/destroy',[
		'uses'=>'TagsController@destroy',
		'as'=>'tags.destroy'
	]);
	Route::post('tags/modal',[
		'uses'=>'TagsController@ModalStore',
		'as'=>'tags.moda.store'
	]);

	//Articulos
	Route::resource('articles','ArticlesController');
	Route::get('articles/{id}/destroy',[
		'uses'=>'ArticlesController@destroy',
		'as'=>'articles.destroy'
	]);
	Route::get('articles/destroy/varios',[
		'uses'=>'ArticlesController@eliminarVarios',
		'as'=>'articles.varios'
	]);
	Route::get('articles/{id}/post',[
		'uses'=>'ArticlesController@post',
		'as'=>'articles.post'
	]);
	Route::get('articles/{id}/undpost',[
		'uses'=>'ArticlesController@undpost',
		'as'=>'articles.undpost'
	]);
	Route::get('articles/{id}/notificar',[
		'uses'=>'ArticlesController@notificacion',
		'as'=>'articles.notificar'
	]);


	

	Route::get('articles/index/admin',[
		'uses'=>'ArticlesController@list',
		'as'=>'articles.list'
	]);

	//Publicidad
	Route::resource('ads','AdsController');
	Route::get('ads/{id}/destroy',[
		'uses'=>'AdsController@destroy',
		'as'=>'ads.destroy'
	]);


	Route::get('eventos',[
		'uses'=>'EventosController@index',
		'as'=>'admin.eventos.index'
	]);

	Route::get('eventos/create',[
		'uses'=>'EventosController@AdminCreate',
		'as'=>'admin.eventos.create'
	]);

	Route::post('eventos',[
		'uses'=>'EventosController@AdminStore',
		'as'=>'admin.eventos.store'
	]);


	
	
	Route::get('eventos/{id}/destroy',[
		'uses'=>'EventosController@AdminDestroy',
		'as'=>'admin.eventos.destroy'
	]);

	Route::get('eventos/{id}/show',[
		'uses'=>'EventosController@AdminShow',
		'as'=>'admin.eventos.show'
	]);

	Route::get('eventos/{id}/edit',[
		'uses'=>'EventosController@AdminEdit',
		'as'=>'admin.eventos.edit'
	]);

	Route::put('eventos/{id}/update',[
		'uses'=>'EventosController@AdminUpdate',
		'as'=>'admin.eventos.update'
	]);

	Route::get('evento/{id}/post',[
		'uses'=>'EventosController@post',
		'as'=>'evento.post'
	]);
	Route::get('evento/{id}/undpost',[
		'uses'=>'EventosController@undpost',
		'as'=>'evento.undpost'
	]);

	Route::get('user/{id}/articles',[
		'uses'=>'UsersController@ArticlesForUser',
		'as'=>'user.articles'
	]);

	////PRODUCTO
	Route::get('preducto/create',[
		'uses'=>'AdsController@ProductoCreate',
		'as'=>'admin.preducto.create'
	]);

	Route::post('preducto',[
		'uses'=>'AdsController@ProductoStore',
		'as'=>'admin.preducto.store'
	]);
	
	Route::get('preducto/{id}/destroy',[
		'uses'=>'AdsController@ProductoDestroy',
		'as'=>'admin.preducto.destroy'
	]);

	Route::get('preducto/{id}/show',[
		'uses'=>'AdsController@ProductoShow',
		'as'=>'admin.preducto.show'
	]);

	Route::get('preducto/{id}/edit',[
		'uses'=>'AdsController@ProductoEdit',
		'as'=>'admin.preducto.edit'
	]);

	Route::put('preducto/{id}/update',[
		'uses'=>'AdsController@ProductoUpdate',
		'as'=>'admin.preducto.update'
	]);



	





});

Route::group(['prefix'=>'editor','middleware'=>['auth','editor']], function(){

	Route::get('/',function(){
		return view('editor.index');
	})->name('editor.inicio');
/*
	Route::resource('users','UsersController');
	Route::get('users/{id}/destroy',[
		'uses'=>'UsersController@destroy',
		'as'=>'users.destroy'
	]);

	Route::resource('categories','CategoriesController');
	Route::get('categories/{id}/destroy',[
		'uses'=>'CategoriesController@destroy',
		'as'=>'categories.destroy'
	]);

	//tags
	Route::resource('tags','TagsController');
	Route::get('tags/{id}/destroy',[
		'uses'=>'TagsController@destroy',
		'as'=>'tags.destroy'
	]);
*/
	//Articulos
	Route::get('articles',[
		'uses'=>'ArticlesController@EditorIndex',
		'as'=>'editor.articles.index'
	]);

	Route::post('articles',[
		'uses'=>'ArticlesController@EditorStore',
		'as'=>'editor.articles.store'
	]);

	Route::get('articles/create',[
		'uses'=>'ArticlesController@EditorArticleCreate',
		'as'=>'editor.articles.create'
	]);
	Route::get('articles/{id}/show',[
		'uses'=>'ArticlesController@EditorArticleShow',
		'as'=>'editor.articles.show'
	]);
	Route::get('articles/{id}/edit',[
		'uses'=>'ArticlesController@EditorArticleEdit',
		'as'=>'editor.articles.edit'
	]);
	Route::put('articles/{id}/update',[
		'uses'=>'ArticlesController@EditorArticleUpdate',
		'as'=>'editor.articles.update'
	]);
	Route::get('articles/{id}/destroy',[
		'uses'=>'ArticlesController@EditorArticleDestroy',
		'as'=>'editor.articles.destroy'
	]);

	Route::post('tags/modal',[
		'uses'=>'TagsController@ModalStore',
		'as'=>'tags.moda.store'
	]);




	
	/*
	Route::get('articles/{id}/post',[
		'uses'=>'ArticlesController@post',
		'as'=>'articles.post'
	]);
	Route::get('articles/{id}/undpost',[
		'uses'=>'ArticlesController@undpost',
		'as'=>'articles.undpost'
	]);*/


});


Route::group(['prefix'=>'even','middleware'=>['auth','eventista']], function(){

	Route::get('/',function(){
		return view('eventista.index');
	})->name('eventista.inicio');

	//Articulos
	Route::resource('eventos','EventosController');
	Route::get('eventos/{id}/destroy',[
		'uses'=>'EventosController@destroy',
		'as'=>'eventos.destroy'
	]);

	Route::get('eventos',[
		'uses'=>'EventosController@indexUser',
		'as'=>'eventista.eventos.index'
	]);
	
	

});

Route::group(['prefix'=>'revisor','middleware'=>['auth','revisor']], function(){

	Route::get('/',function(){
		return view('revisor.index');
	})->name('revisor.inicio');

	Route::get('misarticles',[
		'uses'=>'ArticlesController@RevisorArticles',
		'as'=>'revisor.articles.articlesList'
	]);

	Route::get('articles',[
		'uses'=>'ArticlesController@RevisorList',
		'as'=>'revisor.articles.list'
	]);	

	Route::post('articles',[
		'uses'=>'ArticlesController@RevisorStore',
		'as'=>'revisor.articles.store'
	]);

	Route::get('articles/{id}/edit',[
		'uses'=>'ArticlesController@RevisorArticleEdit',
		'as'=>'revisor.articles.edit'
	]);
	Route::put('articles/{id}/update',[
		'uses'=>'ArticlesController@RevisorArticleUpdate',
		'as'=>'revisor.articles.update'
	]);


	Route::get('articles/{id}/show',[
		'uses'=>'ArticlesController@RevisorArticleShow',
		'as'=>'revisor.articles.show'
	]);

	Route::get('articles/create',[
		'uses'=>'ArticlesController@RevisorArticleCreate',
		'as'=>'revisor.articles.create'
	]);

	Route::get('miarticles/{id}/editMiArticulos',[
		'uses'=>'ArticlesController@RevisorArticleEditMiArticulos',
		'as'=>'revisor.articles.editMiMiArticulos'
	]);
	Route::put('miarticles/{id}/update',[
		'uses'=>'ArticlesController@RevisorArticleUpdateMiArticulos',
		'as'=>'revisor.articles.updateMiArticulosMiArticulos'
	]);

	Route::get('articles/{id}/destroy',[
		'uses'=>'ArticlesController@RevisorArticleDestroy',
		'as'=>'revisor.articles.destroy'
	]);
		

});


Route::group(['prefix'=>'nuevo','middleware'=>['auth','nova']], function(){

	Route::get('/',function(){
		return view('nova.index');
	})->name('nuevo.inicio');
		

});

Route::group(['prefix'=>'ventas','middleware'=>['auth','ventas']], function(){

	Route::get('/',function(){
		return view('vendedor.index');
	})->name('vendedor.inicio');


	//PUBLICIDAD VENDEDOR
	Route::get('articles',[
		'uses'=>'AdsController@VentasIndex',
		'as'=>'vendedor.ads.index'
	]);

	Route::post('articles',[
		'uses'=>'ArticlesController@EditorStore',
		'as'=>'editor.articles.store'
	]);

	Route::get('articles/create',[
		'uses'=>'ArticlesController@EditorArticleCreate',
		'as'=>'editor.articles.create'
	]);
	Route::get('articles/{id}/show',[
		'uses'=>'ArticlesController@EditorArticleShow',
		'as'=>'editor.articles.show'
	]);
	Route::get('articles/{id}/edit',[
		'uses'=>'ArticlesController@EditorArticleEdit',
		'as'=>'editor.articles.edit'
	]);
	Route::put('articles/{id}/update',[
		'uses'=>'ArticlesController@EditorArticleUpdate',
		'as'=>'editor.articles.update'
	]);
	Route::get('articles/{id}/destroy',[
		'uses'=>'ArticlesController@EditorArticleDestroy',
		'as'=>'editor.articles.destroy'
	]);
		

});



#
Route::get('/', 'HomeController@index');

Route::get('article/{id}/',[
		'uses'=>'ArticlesController@PublicShow',
		'as'=>'users.public'
]);

Route::get('evento/{id}/',[
		'uses'=>'EventosController@PublicShow',
		'as'=>'evento.public'
]);

Route::group(['prefix'=>'pdf'], function(){
	Route::get('/{id}/',[
		'uses'=>'AdsController@CreatePdf',
		'as'=>'ads.CreatePdf'
	]);

	Route::post('storePdf/',[
		'uses'=>'AdsController@pdf',
		'as'=>'ads.storePdf'
	]);

});


Auth::routes();