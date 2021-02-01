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


//Login
Route::group(['middleware' => ['cors']], function() {

	Route::get('login', 'LoginController@index');
	Route::post('login/registro', 'LoginController@registro');
	Route::post('login/ingreso', 'LoginController@ingresar');
	Route::get('login/logout', 'LoginController@logout');

	//Productos esto será para el admin
	Route::get('productos', 'ProductosController@index');
	Route::get('productos/{producto}', 'ProductosController@getProducto');
	Route::post('productos', 'ProductosController@createProducto');
	Route::delete('productos/{producto}', 'ProductosController@deleteProducto');
	Route::put('productos/{producto}', 'ProductosController@updateProducto');

	//Tienda
	Route::get('tienda/get-destacados', 'TiendaController@getDestacados');	
	Route::get('tienda/get-producto/{producto}', 'TiendaController@getProducto');	
});

