<?php

class CasesController extends \BaseController {

	/**
	 * Display a listing of cases
	 *
	 * @return Response
	 */
	public function index()
	{
		$cases = Case::all();

		return View::make('cases.index', compact('cases'));
	}

	/**
	 * Show the form for creating a new case
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cases.create');
	}

	/**
	 * Store a newly created case in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Case::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Case::create($data);

		return Redirect::route('cases.index');
	}

	/**
	 * Display the specified case.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$case = Case::findOrFail($id);

		return View::make('cases.show', compact('case'));
	}

	/**
	 * Show the form for editing the specified case.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$case = Case::find($id);

		return View::make('cases.edit', compact('case'));
	}

	/**
	 * Update the specified case in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$case = Case::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Case::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$case->update($data);

		return Redirect::route('cases.index');
	}

	/**
	 * Remove the specified case from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Case::destroy($id);

		return Redirect::route('cases.index');
	}

}
