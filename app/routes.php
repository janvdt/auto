<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$HomeController = new HomeController;
	return $HomeController->index();
});

Route::get('login', array('as' => 'login', function()
{
	return View::make('instance.login');
}));

Route::post('login', function()
{
	$email = Input::get('email');
	$password = Input::get('password');
	$remember = Input::get('remember') ? true : false;

	if (Auth::attempt(array('email' => $email, 'password' => $password), $remember))
	{
					
			return Redirect::to('/');

	}
	
	return Redirect::to('login')->withInput()->with('login_errors', true);
});

Route::get('logout', function() {
	Auth::logout();
	return Redirect::to('/');

});

Route::get('files', 'FileController@index');
Route::post('files', 'FileController@store');
Route::post('images', 'ImageController@index');
Route::resource('store', 'StoreController');
Route::resource('brand', 'BrandController');
Route::resource('image', 'ImageController');
Route::post('bullbar/getArticles', 'BullbarController@getArticles');
Route::get('bullbar/getYears/{id}', 'BullbarController@getYears');
Route::get('bullbar/getTypes/{id}', 'BullbarController@getTypes');
Route::resource('bullbar', 'BullbarController');
Route::get('bullbar/getModels/{id}', 'BullbarController@getModels');


