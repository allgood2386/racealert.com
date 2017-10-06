<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = Race::all();
        return view('races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'raceName' => 'required',
          'raceDescription' => 'required',
          'raceStart' => 'required',
          'raceEnd' => 'required',
        ];

        $request->validate($rules);
        $race = new Race($request->input());
        $race->saveOrFail();

        return redirect()->action('RaceController@index')->with('status', sprintf('You have created %s', $race->raceName));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        return view('races.show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Race $race)
    {
        return view('races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Race $race)
    {
      $rules = [
        'raceName' => 'required',
        'raceDescription' => 'required',
        'raceStart' => 'required',
        'raceEnd' => 'required',
      ];

      $request->validate($rules);

      foreach($race->fillable as $property) {
        if ($value = $request->input($property)){
          $race->$property = $value;
        }
      }
      $race->saveOrFail();

      return redirect()->action('RaceController@index')->with('status', sprintf('Race %s has been updated.', $race->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        $race->delete();
        return redirect()->route('races.index')->with('status', sprintf('The Race %s was deleted.', $race->raceName));
    }
}
