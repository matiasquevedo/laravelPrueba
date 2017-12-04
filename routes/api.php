<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::group(['prefix'=>'/v1','middleware' => 'cors'], function(){
	Route::get('/articles',[
		'uses'=>'ArticlesController@ApiIndex'
	]);

	Route::get('/categories',[
		'as'=>'categories',
		'uses'=>'ArticlesController@ApiCategories'
	]);

	Route::get('/tags',[
		'as'=>'tags',
		'uses'=>'ArticlesController@ApiTags'
	]);

	Route::get('/article/{id}/show',[
		'as'=>'articles.show',
		'uses'=>'ArticlesController@ApiShow'
	]);

	Route::get('/categories/{id}/articles',[
		'as'=>'articles.category',
		'uses'=>'ArticlesController@ApiArticlesByCategory'
	]);
});