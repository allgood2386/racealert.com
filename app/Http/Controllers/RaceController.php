<?php namespace App\Http\Controllers;

use App\Http\Requests\RaceRequest;
use App\Race;
use App\RaceType;
use App\RaceWeekend;

class RaceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $races = Race::latest('start')->get();

		return view('races.index', compact('races'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $types = RaceType::lists('type', 'id');
        $raceWeekends = RaceWeekend::lists('event_name', 'id');
		return view('races.create', compact('types', 'raceWeekends'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RaceRequest $request)
	{
		$race = Race::create($request->all());
        $this->syncTypes($race, $request->input('type_list'));

        return redirect('race');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Race $race)
	{
		return view('races.show', compact('race'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Race $race)
	{
        $types = RaceType::lists('type', 'id');
		return view('races.edit', compact('race', 'types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Race $race, RaceRequest $request)
	{
		$race->update($request->all());

        $this->syncTypes($race, $request->input('type_list'));

        return redirect('race');
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

    private function syncTypes(Race $race, array $types)
    {
        $race->raceTypes()->sync($types);
    }

}
