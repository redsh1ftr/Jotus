<?php

class ShippingPricesController extends \BaseController {

	/**
	 * Display a listing of shippingprices
	 *
	 * @return Response
	 */
	public function index()
	{
		$shippingprices = Shippingprice::all();

		return View::make('shippingprices.index', compact('shippingprices'));
	}

	/**
	 * Show the form for creating a new shippingprice
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('shippingprices.create');
	}

	/**
	 * Store a newly created shippingprice in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Shippingprice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Shippingprice::create($data);

		return Redirect::route('shippingprices.index');
	}

	/**
	 * Display the specified shippingprice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$shippingprice = Shippingprice::findOrFail($id);

		return View::make('shippingprices.show', compact('shippingprice'));
	}

	/**
	 * Show the form for editing the specified shippingprice.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$shippingprice = Shippingprice::find($id);

		return View::make('shippingprices.edit', compact('shippingprice'));
	}

	/**
	 * Update the specified shippingprice in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$shippingprice = Shippingprice::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Shippingprice::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$shippingprice->update($data);

		return Redirect::route('shippingprices.index');
	}

	/**
	 * Remove the specified shippingprice from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Shippingprice::destroy($id);

		return Redirect::route('shippingprices.index');
	}

}
