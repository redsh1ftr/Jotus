<?php

class CourtsController extends \BaseController {

	/**
	 * Display a listing of courts
	 *
	 * @return Response
	 */
	public function index()
	{
		$courts = Court::all();

		return View::make('courts.index', compact('courts'));
	}

	/**
	 * Show the form for creating a new court
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('courts.create');
	}

	/**
	 * Store a newly created court in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Court::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Court::create($data);

		return Redirect::route('courts.index');
	}

	/**
	 * Display the specified court.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$court = Court::findOrFail($id);

		return View::make('courts.show', compact('court'));
	}

	/**
	 * Show the form for editing the specified court.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$court = Court::find($id);

		return View::make('courts.edit', compact('court'));
	}

	/**
	 * Update the specified court in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$court = Court::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Court::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$court->update($data);

		return Redirect::route('courts.index');
	}

	/**
	 * Remove the specified court from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Court::destroy($id);

		return Redirect::route('courts.index');
	}

}
