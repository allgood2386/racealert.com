<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackRequest;
use App\Http\Requests\UpdateTrackRequest;
use App\Repositories\TrackRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\TrackConfiguration;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TrackController extends AppBaseController
{
    /** @var  TrackRepository */
    private $trackRepository;

    public function __construct(TrackRepository $trackRepo)
    {
        $this->trackRepository = $trackRepo;
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the Track.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trackRepository->pushCriteria(new RequestCriteria($request));
        $tracks = $this->trackRepository->all();

        return view('tracks.index')
            ->with('tracks', $tracks);
    }

    /**
     * Show the form for creating a new Track.
     *
     * @return Response
     */
    public function create()
    {
        return view('tracks.create');
    }

    /**
     * Store a newly created Track in storage.
     *
     * @param CreateTrackRequest $request
     *
     * @return Response
     */
    public function store(CreateTrackRequest $request)
    {
        $input = $request->all();

        $track = $this->trackRepository->create($input);

        Flash::success('Track saved successfully.');

        return redirect(route('tracks.index'));
    }

    /**
     * Display the specified Track.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $track = $this->trackRepository->findWithoutFail($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('tracks.index'));
        }

        return view('tracks.show')->with('track', $track);
    }

    /**
     * Show the form for editing the specified Track.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $track = $this->trackRepository->findWithoutFail($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('tracks.index'));
        }

        return view('tracks.edit')->with('track', $track);
    }

    /**
     * Update the specified Track in storage.
     *
     * @param  int              $id
     * @param UpdateTrackRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrackRequest $request)
    {
        $track = $this->trackRepository->findWithoutFail($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('tracks.index'));
        }

        $track = $this->trackRepository->update($request->all(), $id);

        Flash::success('Track updated successfully.');

        return redirect(route('tracks.index'));
    }

    /**
     * Remove the specified Track from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $track = $this->trackRepository->findWithoutFail($id);

        if (empty($track)) {
            Flash::error('Track not found');

            return redirect(route('tracks.index'));
        }

        $this->trackRepository->delete($id);

        Flash::success('Track deleted successfully.');

        return redirect(route('tracks.index'));
    }
}
