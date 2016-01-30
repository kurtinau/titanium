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

Route::get('/', 'WelcomeController@index');
Route::get('admin', 'AdminController@index');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::resource('home', 'HomeController');
Route::resource('test', 'TestController');

// Route::group(['prefix' => 'home', 'namespace' => 'Home'], function()
// {
//   Route::resource('products', 'ProductShowController');
// });
Route::get('products', 'Home\ProductShowController@index');
Route::get('products/{cid}/{pid}', 'Home\ProductShowController@showDetail');
Route::get('products/{cid}', 'Home\ProductShowController@showCategoryProducts');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
  Route::resource('categories', 'CategoriesController');
  Route::resource('products', 'ProductsController');
});


Route::get('img/{path}', function (League\Glide\Server $server, Illuminate\Http\Request $request, $path)
{
    $server->outputImage($path, $request->all());
})->where('path', '.+');



Route::filter('csrf', function(){
	if(Session::token() !== Input::get('_token'))
		throw new Illuminate\Session\TokenMismatchException;
});


// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
