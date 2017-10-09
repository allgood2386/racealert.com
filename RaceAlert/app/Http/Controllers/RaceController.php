<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRaceRequest;
use App\Http\Requests\UpdateRaceRequest;
use App\Repositories\RaceRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Track;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RaceController extends AppBaseController
{
    /** @var  RaceRepository */
    private $raceRepository;

    public function __construct(RaceRepository $raceRepo)
    {
        $this->raceRepository = $raceRepo;
    }

    /**
     * Display a listing of the Race.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->raceRepository->pushCriteria(new RequestCriteria($request));
        $races = $this->raceRepository->all();

        return view('races.index')
            ->with('races', $races);
    }

    /**
     * Show the form for creating a new Race.
     *
     * @return Response
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created Race in storage.
     *
     * @param CreateRaceRequest $request
     *
     * @return Response
     */
    public function store(CreateRaceRequest $request)
    {
        $input = $request->all();

        $race = $this->raceRepository->create($input);

        Flash::success('Race saved successfully.');

        return redirect(route('races.index'));
    }

    /**
     * Display the specified Race.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        return view('races.show')->with('race', $race);
    }

    /**
     * Show the form for editing the specified Race.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }
        $tracks = Track::pluck('name', 'id');
        return view('races.edit', compact('tracks'))->with('race', $race);
    }

    /**
     * Update the specified Race in storage.
     *
     * @param  int              $id
     * @param UpdateRaceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRaceRequest $request)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        $race = $this->raceRepository->update($request->all(), $id);

        Flash::success('Race updated successfully.');

        return redirect(route('races.index'));
    }

    /**
     * Remove the specified Race from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            Flash::error('Race not found');

            return redirect(route('races.index'));
        }

        $this->raceRepository->delete($id);

        Flash::success('Race deleted successfully.');

        return redirect(route('races.index'));
    }
}
