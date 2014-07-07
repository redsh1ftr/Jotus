<?php

class NorsController extends \BaseController {

	/**
	 * Display a listing of nors
	 *
	 * @return Response
	 */
	public function index()
	{
		$nors = Nor::all();

		return View::make('nors.index', compact('nors'));
	}

	/**
	 * Show the form for creating a new nor
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('nors.create');
	}

	/**
	 * Store a newly created nor in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Nor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Nor::create($data);

		return Redirect::route('nors.index');
	}

	/**
	 * Display the specified nor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$nor = Nor::findOrFail($id);

		return View::make('nors.show', compact('nor'));
	}

	/**
	 * Show the form for editing the specified nor.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$nor = Nor::find($id);

		return View::make('nors.edit', compact('nor'));
	}

	/**
	 * Update the specified nor in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$nor = Nor::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Nor::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$nor->update($data);

		return Redirect::route('nors.index');
	}

	/**
	 * Remove the specified nor from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Nor::destroy($id);

		return Redirect::route('nors.index');
	}

}
