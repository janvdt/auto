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

Route::resource('store', 'StoreController');