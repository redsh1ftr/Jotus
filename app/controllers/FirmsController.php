<?php

class FirmsController extends \BaseController {

	/**
	 * Display a listing of firms
	 *
	 * @return Response
	 */
	public function index()
	{
		$firms = Firm::all();

		return View::make('firms.index', compact('firms'));
	}

	/**
	 * Show the form for creating a new firm
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('firms.create');
	}

	/**
	 * Store a newly created firm in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Firm::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Firm::create($data);

		return Redirect::route('firms.index');
	}

	/**
	 * Display the specified firm.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$firm = Firm::findOrFail($id);

		return View::make('firms.show', compact('firm'));
	}

	/**
	 * Show the form for editing the specified firm.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$firm = Firm::find($id);

		return View::make('firms.edit', compact('firm'));
	}

	/**
	 * Update the specified firm in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$firm = Firm::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Firm::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$firm->update($data);

		return Redirect::route('firms.index');
	}

	/**
	 * Remove the specified firm from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Firm::destroy($id);

		return Redirect::route('firms.index');
	}

}
