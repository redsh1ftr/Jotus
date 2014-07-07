<?php

class StatusLettersController extends \BaseController {

	/**
	 * Display a listing of statusletters
	 *
	 * @return Response
	 */
	public function index()
	{
		$statusletters = Statusletter::all();

		return View::make('statusletters.index', compact('statusletters'));
	}

	/**
	 * Show the form for creating a new statusletter
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('statusletters.create');
	}

	/**
	 * Store a newly created statusletter in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Statusletter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Statusletter::create($data);

		return Redirect::route('statusletters.index');
	}

	/**
	 * Display the specified statusletter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$statusletter = Statusletter::findOrFail($id);

		return View::make('statusletters.show', compact('statusletter'));
	}

	/**
	 * Show the form for editing the specified statusletter.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$statusletter = Statusletter::find($id);

		return View::make('statusletters.edit', compact('statusletter'));
	}

	/**
	 * Update the specified statusletter in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$statusletter = Statusletter::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Statusletter::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$statusletter->update($data);

		return Redirect::route('statusletters.index');
	}

	/**
	 * Remove the specified statusletter from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Statusletter::destroy($id);

		return Redirect::route('statusletters.index');
	}

}
