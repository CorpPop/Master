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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','MainController@home');
Route::get('/carrito','ShoppingCartsController@index');
Route::post('/carrito','ShoppingCartsController@checkout');
// Route::put('/carrito','ShoppingCartsController@checktiket');
Route::get('/payments/store','PaymentsController@store');

Auth::routes();
Route::resource('products','ProductsController');
Route::resource('politicas','PoliticasController');
Route::resource('catalogo','CatalogosController');
Route::resource('warehouses','WarehouseController');
Route::resource('in_shopping_carts','InShoppingCartsController',['only' => ['store','destroy']]);
Route::resource('orders','OrdersController',['only' => ['index','update']]);
Route::resource('compras','ShoppingCartsController',['only' => ['show']]);
// Route::resource('create','ProductsController@create');
/*
	GET /products => index
	POST /products => store
	GET /products/create => Formulario para creae

	GET /products/:id => Mostrar un producto con ID
	GET /products/:id/edit
	PUT/PATCH /products/:id
	DELETE /products/:id
*/

// Route::resource("carrito/{id}","ShoppingCartsController@detroy");
// Route::resource('in_shopping_carts/'{id},'ShoppingCartsController',['only' => ['store','destroy']]);
// Route::get("products/carro","ProductsController@carro");


Route::get('home', 'HomeController@index')->name('home');
Route::get('products/images/{filename}',function($filename){
	$path = storage_path("app/images/$filename");
	if (!\File::exists($path))  abort(404);

		$file = \File::get($path);
		$type = \File::mimeType($path);
		$response = Response::make($file,200);
		$response->header("Content-Type",$type);
		return $response;
	
});