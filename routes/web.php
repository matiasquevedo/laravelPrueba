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
	Route::post('eliminar/varios/{datos}','ArticlesController@eliminarVarios');
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

Auth::routes();
#
Route::get('/', 'HomeController@index');
Route::get('article/{id}/',[
		'uses'=>'ArticlesController@PublicShow',
		'as'=>'users.public'
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