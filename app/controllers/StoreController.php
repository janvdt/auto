<?php

class StoreController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::user()){
		$store = Store::find($id);

		// Get images for initial image select.
		$images = Image::orderBy('created_at', 'desc')->take(10)->get();

		return View::make('store.edit')
			->with('store',$store)
			->with('images',$images);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Auth::user()){
		$validator = Validator::make(
			Input::all(),
			array(
				'name'	=> 'required',
				'body'	=> 'required',
			)
		);

		if ($validator->fails())
		{
			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}

		$store = Store::find($id);
		$store->name = Input::get('name');
		$store->description = Input::get('body');
		
			// If an image must be de-linked from this page.
		if (Input::get('delete_image')) {
			$store->image_id = 0;
		}

		// Only update image id if an image id was provided.
		if (Input::get('image_id')) {
			$store->image_id = Input::get('image_id');
		}

		die(Input::get('image_id'));



		$store->save();

		return Redirect::to('/');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}