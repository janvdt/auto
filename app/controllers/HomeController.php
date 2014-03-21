<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$stores = Store::take(3)->get();
		$thule = Brand::where('name','Thule')->first();
		$autostyle = Brand::where('name','AutoStyle')->first();

		return View::make('hello')
			->with('stores',$stores)
			->with('thule',$thule)
			->with('autostyle',$autostyle);
	}

}