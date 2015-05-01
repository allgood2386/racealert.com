<?php namespace App\Http\Controllers;

use App\Http\Requests\RaceSeriesRequest;
use App\RaceSeries;

class RaceSeriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$raceSeries = RaceSeries::latest('start')->get();
        return view('raceseries.index', compact('raceSeries'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('raceseries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RaceSeriesRequest $request)
	{
		RaceSeries::create($request->all());

        return redirect('raceseries');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(RaceSeries $raceSeries)
	{
		return view('raceseries.show', compact('raceSeries'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(RaceSeries $raceSeries)
	{
		return view('raceseries.edit', compact('raceSeries'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(RaceSeries $raceSeries, RaceSeriesRequest $request)
	{
		$raceSeries->update($request->all());

        return redirect('raceseries');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
