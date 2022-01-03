<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/categorias', 'CategoriaController@index');
Route::get('/categorias/novo', 'CategoriaController@create');
Route::get('/categorias/apagar/{id}', 'CategoriaController@destroy');
Route::get('/categorias/editar/{id}', 'CategoriaController@edit');
Route::put('/categorias/salvar/{id}', 'CategoriaController@update');
Route::post('/categorias', 'CategoriaController@store');

Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/novo', 'ProdutoController@create');
Route::get('/produtos/apagar/{id}', 'ProdutoController@destroy');
Route::get('/produtos/editar/{id}', 'ProdutoController@edit');
Route::put('/produtos/salvar/{id}', 'ProdutoController@update');
Route::post('/produtos', 'ProdutoController@store');
