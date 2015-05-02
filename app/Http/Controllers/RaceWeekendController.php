<?php namespace App\Http\Controllers;

use App\Http\Requests\RaceWeekendRequest;
use App\RaceWeekend;
use App\Race;

/**
 * Class RaceWeekendController
 * @package App\Http\Controllers
 */
class RaceWeekendController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $raceWeekends = RaceWeekend::latest('start')->get();

        return view('raceweekends.index', compact('raceWeekends'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('raceweekends.create');
	}

    /**
     * @param RaceWeekendRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RaceWeekendRequest $request)
	{
        RaceWeekend::create($request->all());

        return redirect('raceweekends');
	}

    /**
     * Show a single RaceWeekend.
     *
     * @param \App\RaceWeekend $raceweekend
     *  A RaceWeekend Object to view.
     *
     * @return \Illuminate\View\View
     */
    public function show(RaceWeekend $raceweekend)
	{
		return view('raceweekends.show', compact('raceweekend'));
	}

    /**
     * Returns our edit form.
     * @param RaceWeekend $raceWeekend
     *   RaceWeekend to alter.
     *
     * @return \Illuminate\View\View
     */
    public function edit(RaceWeekend $raceWeekend)
    {
        return view('raceweekends.edit', compact('raceWeekend'));
    }

	/**
     * Update the specified resource in storage.
     *
     * @param  RaceWeekend $raceWeekend
     *   RaceWeekend to update.
     *
     * @param RaceWeekendRequest $request
     *   RaceWeekendRequest to process.
     *
	 * @return Response
	 */
	public function update(RaceWeekend $raceWeekend, RaceWeekendRequest $request)
	{
		$raceWeekend->update($request->all());

        return redirect('raceweekends');
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
