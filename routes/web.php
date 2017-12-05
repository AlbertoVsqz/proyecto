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
Route::bind('promocion',function($slug){
	return tienda\Promociones::where('url',$slug)->first();

});
Route::bind('sub',function($slug){
	return tienda\SubCategoria::where('url',$slug)->first();
});

Route::bind('marca',function($marca){
	return tienda\Marcas::where('url',$marca)->first();
});






Route::get('/', 'IndexController@index')->name('/');
Route::get('index', 'IndexController@index');


Route::get('productos/subcategoria/{sub}','ProductosController@showSub');
Route::get('productos/categoria/{cat}','ProductosController@showcat');
Route::get('productos/marcas/{marca}','ProductosController@showMarca');


Route::GET('load/', 'PruebaController@loadArchivo');

 Route::get('productos', 'ProductosController@index');

 Route::get('/detalle/{url}','DetalleController@show');
 Route::get('/detalle/promo/{url}','DetalleController@showpromo');
 Route::get('detalle','ProductosController@index');
// Route::get('login','LoginController@index');

 // Authentication Routes...
 Route::get('login', 'Auth\LoginController@index')->name('login')->middleware('guest');
 Route::post('login', 'Auth\LoginController@login');
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 // Registration Routes...
 Route::get('registro', 'Auth\RegisterController@index')->name('registro');
 Route::post('registro', 'Auth\RegisterController@register');

 Route::get('miperfil', 'MyPerfilController@index')->name('miperfil');
 Route::post('miperfil', 'MyperfilController@update');

        // Password Reset Routes...
      //   Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        // Route::post('password/reset', 'Auth\ResetPasswordController@reset');



//Route::get('/home', 'HomeController@index')->name('home');

//Carrito---------------------

Route::get('carrito/show','CarritoController@show');


Route::get('carrito/add/{producto}','CarritoController@add');
Route::get('carrito/promo/add/{promocion}','CarritoController@addpromo');
Route::get('carrito/delete/{producto}','CarritoController@delete');
Route::get('carrito/vaciar','CarritoController@vaciar');
Route::get('carrito/vaciarlink','CarritoController@vaciarlink');

Route::get('carrito/update/{producto}/{cantidad}','CarritoController@update');

Route::get('detalle_orden',[
	'middleware'=>'auth',
	'uses'=>'CarritoController@detalle_orden']);

//---------------------------------
//paypal

//enviamos nuestro pedido a Paypal
Route::get('payment', array(
	'as' => 'payment',
	'uses' => 'PaypalController@postPayment',
));

//Paypal redirecciona a esta ruta
 
Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));

route::get('prueba','PaypalController@saveOrder');


route::get('paybank','PaybankController@pago');
route::get('reservar','ReservarController@reservar');

//Comentarios

Route::get('addcomentario', 'DetalleController@addcomentario');
//Route::post('busqueda', 'PruebaController@busqueda');
Route::get('busqueda', 'PruebaController@busqueda');


//Mail

Route::GET('mail', 'PruebaController@enviarmail');

route::get('contactanos','ContactanosController@index');
route::post('formcontacto','ContactanosController@enviarmail');


Route::GET('quienes-somos', 'QuienesSomosController@index');

