<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 后台管理
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function(){

    Route::get('index', ['uses' => 'IndexController@index']);

    // 资讯管理
    Route::group(['prefix' => 'news'], function(){
        Route::get('/', ['as' => 'admin.news.index', 'uses' => 'NewsController@index']);
        Route::get('create', ['as' => 'admin.news.create', 'uses' => 'NewsController@create']);
        Route::post('/', ['as' => 'admin.news.store', 'uses' => 'NewsController@store']);
        Route::get('/{id}/edit', ['as' => 'admin.news.edit', 'uses' => 'NewsController@edit']);
        Route::put('/{id}', ['as' => 'admin.news.update', 'uses' => 'NewsController@update']);
        Route::get('/{id}', ['as' => 'admin.news.show', 'uses' => 'NewsController@show']);
        Route::delete('/{id}', ['as' => 'admin.news.destroy', 'uses' => 'NewsController@destroy']);

        Route::post('/imgUpload', ['as' => 'admin.news.upload', 'uses' => 'NewsController@imgUpload']);
    });

    // 案例展示
    Route::group(['prefix' => 'cases'], function(){
        Route::get('/', ['as' => 'admin.cases.index', 'uses' => 'CasesController@index']);
        Route::post('/', ['as' => 'admin.cases.store', 'uses' => 'CasesController@store']);
        Route::get('/{id}', ['as' => 'admin.cases.show', 'uses' => 'CasesController@show']);
        Route::delete('/{id}', ['as' => 'admin.cases.destroy', 'uses' => 'CasesController@destroy']);

        Route::post('/imgUpload', ['as' => 'admin.cases.upload', 'uses' => 'CasesController@imgUpload']);
    });

    // 产品中心
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', ['as' => 'admin.products.index', 'uses' => 'ProductsController@index']);
        Route::get('create', ['as' => 'admin.products.create', 'uses' => 'ProductsController@create']);
        Route::post('/', ['as' => 'admin.products.store', 'uses' => 'ProductsController@store']);
        Route::get('/{id}/edit', ['as' => 'admin.products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('/{id}', ['as' => 'admin.products.update', 'uses' => 'ProductsController@update']);
        Route::get('/{id}', ['as' => 'admin.products.show', 'uses' => 'ProductsController@show']);
        Route::delete('/{id}', ['as' => 'admin.products.destroy', 'uses' => 'ProductsController@destroy']);

        Route::post('/imgUpload', ['as' => 'admin.products.upload', 'uses' => 'ProductsController@imgUpload']);
    });
});

// 前台页面
Route::group(['namespace' => 'Frontend'], function(){
    
});
Route::auth();

Route::get('/home', 'HomeController@index');
