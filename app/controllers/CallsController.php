<?php

class CallsController extends \BaseController {

	/**
	 * Display a listing of calls
	 *
	 * @return Response
	 */
	public function index()
	{
		$calls = Call::all();

		return View::make('calls.index', compact('calls'));
	}

	/**
	 * Show the form for creating a new call
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('calls.create');
	}

	/**
	 * Store a newly created call in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Call::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Call::create($data);

		return Redirect::route('calls.index');
	}

	/**
	 * Display the specified call.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$call = Call::findOrFail($id);

		return View::make('calls.show', compact('call'));
	}

	/**
	 * Show the form for editing the specified call.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$call = Call::find($id);

		return View::make('calls.edit', compact('call'));
	}

	/**
	 * Update the specified call in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$call = Call::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Call::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$call->update($data);

		return Redirect::route('calls.index');
	}

	/**
	 * Remove the specified call from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Call::destroy($id);

		return Redirect::route('calls.index');
	}

}
