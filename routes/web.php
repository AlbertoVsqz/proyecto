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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::bind('producto',function($slug){
	return tienda\Productos::where('url',$slug)->first();
});


Route::get('/', 'IndexController@index')->name('/');
Route::get('index', 'IndexController@index');

Route::resource('productos','ProductosController');


Route::GET('load/', 'PruebaController@loadArchivo');

 Route::get('productos', 'ProductosController@index');

 Route::get('/detalle/{url}','DetalleController@show');
 Route::get('detalle','ProductosController@index');
// Route::get('login','LoginController@index');

 // Authentication Routes...
 Route::get('login', 'Auth\LoginController@index')->name('login')->middleware('guest');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 // Registration Routes...
 Route::get('registro', 'Auth\RegisterController@index')->name('registro');
 Route::post('registro', 'Auth\RegisterController@register');

        // Password Reset Routes...
      //   Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('password/reset', 'Auth\ResetPasswordController@reset');



//Route::get('/home', 'HomeController@index')->name('home');

//Carrito---------------------

Route::get('carrito/show','CarritoController@show');


Route::get('carrito/add/{producto}','CarritoController@add');
Route::get('carrito/delete/{producto}','CarritoController@delete');
Route::get('carrito/vaciar','CarritoController@vaciar');

Route::get('carrito/update/{producto}/{cantidad}','CarritoController@update');
