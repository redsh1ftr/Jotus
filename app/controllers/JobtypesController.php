<?php

class JobtypesController extends \BaseController {

	/**
	 * Display a listing of jobtypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$jobtypes = Jobtype::all();

		return View::make('jobtypes.index', compact('jobtypes'));
	}

	/**
	 * Show the form for creating a new jobtype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('jobtypes.create');
	}

	/**
	 * Store a newly created jobtype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Jobtype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Jobtype::create($data);

		return Redirect::route('jobtypes.index');
	}

	/**
	 * Display the specified jobtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$jobtype = Jobtype::findOrFail($id);

		return View::make('jobtypes.show', compact('jobtype'));
	}

	/**
	 * Show the form for editing the specified jobtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$jobtype = Jobtype::find($id);

		return View::make('jobtypes.edit', compact('jobtype'));
	}

	/**
	 * Update the specified jobtype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$jobtype = Jobtype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Jobtype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$jobtype->update($data);

		return Redirect::route('jobtypes.index');
	}

	/**
	 * Remove the specified jobtype from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Jobtype::destroy($id);

		return Redirect::route('jobtypes.index');
	}

}
