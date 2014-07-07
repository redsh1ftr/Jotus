<?php

class CompanyDefaultsController extends \BaseController {

	/**
	 * Display a listing of companydefaults
	 *
	 * @return Response
	 */
	public function index()
	{
		$companydefaults = Companydefault::all();

		return View::make('companydefaults.index', compact('companydefaults'));
	}

	/**
	 * Show the form for creating a new companydefault
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('companydefaults.create');
	}

	/**
	 * Store a newly created companydefault in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Companydefault::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Companydefault::create($data);

		return Redirect::route('companydefaults.index');
	}

	/**
	 * Display the specified companydefault.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$companydefault = Companydefault::findOrFail($id);

		return View::make('companydefaults.show', compact('companydefault'));
	}

	/**
	 * Show the form for editing the specified companydefault.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$companydefault = Companydefault::find($id);

		return View::make('companydefaults.edit', compact('companydefault'));
	}

	/**
	 * Update the specified companydefault in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$companydefault = Companydefault::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Companydefault::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$companydefault->update($data);

		return Redirect::route('companydefaults.index');
	}

	/**
	 * Remove the specified companydefault from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Companydefault::destroy($id);

		return Redirect::route('companydefaults.index');
	}

}
