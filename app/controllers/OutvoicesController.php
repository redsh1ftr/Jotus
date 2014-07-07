<?php

class OutvoicesController extends \BaseController {

	/**
	 * Display a listing of outvoices
	 *
	 * @return Response
	 */
	public function index()
	{
		$outvoices = Outvoice::all();

		return View::make('outvoices.index', compact('outvoices'));
	}

	/**
	 * Show the form for creating a new outvoice
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('outvoices.create');
	}

	/**
	 * Store a newly created outvoice in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Outvoice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Outvoice::create($data);

		return Redirect::route('outvoices.index');
	}

	/**
	 * Display the specified outvoice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$outvoice = Outvoice::findOrFail($id);

		return View::make('outvoices.show', compact('outvoice'));
	}

	/**
	 * Show the form for editing the specified outvoice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$outvoice = Outvoice::find($id);

		return View::make('outvoices.edit', compact('outvoice'));
	}

	/**
	 * Update the specified outvoice in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$outvoice = Outvoice::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Outvoice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$outvoice->update($data);

		return Redirect::route('outvoices.index');
	}

	/**
	 * Remove the specified outvoice from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Outvoice::destroy($id);

		return Redirect::route('outvoices.index');
	}

}
