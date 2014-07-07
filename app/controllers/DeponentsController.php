<?php

class DeponentsController extends \BaseController {

	/**
	 * Display a listing of deponents
	 *
	 * @return Response
	 */
	public function index()
	{
		$deponents = Deponent::all();

		return View::make('deponents.index', compact('deponents'));
	}

	/**
	 * Show the form for creating a new deponent
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('deponents.create');
	}

	/**
	 * Store a newly created deponent in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Deponent::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Deponent::create($data);

		return Redirect::route('deponents.index');
	}

	/**
	 * Display the specified deponent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$deponent = Deponent::findOrFail($id);

		return View::make('deponents.show', compact('deponent'));
	}

	/**
	 * Show the form for editing the specified deponent.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$deponent = Deponent::find($id);

		return View::make('deponents.edit', compact('deponent'));
	}

	/**
	 * Update the specified deponent in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$deponent = Deponent::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Deponent::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$deponent->update($data);

		return Redirect::route('deponents.index');
	}

	/**
	 * Remove the specified deponent from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Deponent::destroy($id);

		return Redirect::route('deponents.index');
	}

}
