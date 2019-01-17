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
Route::get('reporte/{orden}', ['uses'=>'ReporteController@orden', 'as'=> 'orden']);
Route::get('compra', ['uses'=>'ReporteController@compra', 'as'=> 'compra']);
// Route::get('re/{orden}', function(){
// 	dd("dd");
// });s

Route::get('/', function () {
    return view('login');
});

Route::get('users', ['uses'=>'UsuarioController@getusers', 'as'=> 'login']);


Route::get('login', ['uses'=>'UsuarioController@viewLogin', 'as'=> 'login']);
Route::post('login', ['uses'=>'UsuarioController@loginAdmin', 'as'=> 'syslogin']);
Route::get('logout', ['uses'=>'UsuarioController@logout', 'as'=> 'syslogout']);

Route::group(['middleware' => ['auth', 'administrador'], 'prefix'=>'admin'], function () 
{
	// Route::get('/', function(){
	// 	dd("logeado");
	// });
	Route::get('/', ['uses'=>'UsuarioController@index', 'as'=> 'admin.index']);

	Route::group(['prefix'=>'producto'], function()
	{
		Route::get('/get', ['uses'=>'ProductoController@get', 'as'=>'producto.get']);
		Route::get('/getOrdenValidacion', ['uses'=>'ProductoController@getOrdenValidacion', 'as'=>'producto.getOrdenValidacion']);
		Route::get('/', ['uses'=>'ProductoController@list', 'as'=>'producto.list']);
		Route::put('/guardar', ['uses'=>'ProductoController@add', 'as'=>'producto.add']);
		Route::get('/{id}/nuevo', ['uses'=>'ProductoController@viewAdd', 'as'=>'producto.addView']);
		Route::get('/nuevo', ['uses'=>'ProductoController@viewNuevo', 'as'=>'producto.addNuevo']);
		Route::get('/entrega', ['uses'=>'ProductoController@viewEntrega', 'as'=>'producto.entregaView']);
		Route::get('/{id}/entrega', ['uses'=>'ProductoController@entregaConfirm', 'as'=>'producto.entregaConfirm']);
		Route::get('/confirmEntrega', ['uses'=>'ProductoController@confirmEntrega', 'as'=>'producto.confirmEntrega']);

	});

	Route::group(['prefix'=>'tipo'], function()
	{
		Route::get('/getTipo', ['uses'=>'TipoController@getTipo', 'as'=>'producto.getTipo']);
		Route::get('/nuevo', ['uses'=>'TipoController@addView', 'as'=>'tipo.addView']);
		Route::put('/guardar', ['uses'=>'TipoController@add', 'as'=>'tipo.add']);
		Route::put('/{id}/entrega', ['uses'=>'TipoController@entrega', 'as'=>'tipo.entrega']);
	});
	
});

Route::group(['middleware' => ['auth', 'consultor'], 'prefix'=>'consul'], function () 
{
	Route::get('/', function()
	{
		dd('home consultor');
	});
	

});


	