<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTrackConfigurationRequest;
use App\Http\Requests\UpdateTrackConfigurationRequest;
use App\Repositories\TrackConfigurationRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Track;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TrackConfigurationController extends AppBaseController
{
    /** @var  TrackConfigurationRepository */
    private $trackConfigurationRepository;

    public function __construct(TrackConfigurationRepository $trackConfigurationRepo)
    {
        $this->trackConfigurationRepository = $trackConfigurationRepo;
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the TrackConfiguration.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->trackConfigurationRepository->pushCriteria(new RequestCriteria($request));
        $trackConfigurations = $this->trackConfigurationRepository->all();

        return view('track_configurations.index')
            ->with('trackConfigurations', $trackConfigurations);
    }

    /**
     * Show the form for creating a new TrackConfiguration.
     *
     * @return Response
     */
    public function create()
    {
        $tracks = Track::pluck('name', 'id');
        return view('track_configurations.create', compact('tracks'));
    }

    /**
     * Store a newly created TrackConfiguration in storage.
     *
     * @param CreateTrackConfigurationRequest $request
     *
     * @return Response
     */
    public function store(CreateTrackConfigurationRequest $request)
    {
        $input = $request->all();

        $trackConfiguration = $this->trackConfigurationRepository->create($input);

        Flash::success('Track Configuration saved successfully.');

        return redirect(route('trackConfigurations.index'));
    }

    /**
     * Display the specified TrackConfiguration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $trackConfiguration = $this->trackConfigurationRepository->findWithoutFail($id);

        if (empty($trackConfiguration)) {
            Flash::error('Track Configuration not found');

            return redirect(route('trackConfigurations.index'));
        }

        return view('track_configurations.show')->with('trackConfiguration', $trackConfiguration);
    }

    /**
     * Show the form for editing the specified TrackConfiguration.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $trackConfiguration = $this->trackConfigurationRepository->findWithoutFail($id);

        if (empty($trackConfiguration)) {
            Flash::error('Track Configuration not found');

            return redirect(route('trackConfigurations.index'));
        }
        $tracks = Track::pluck('name', 'id');
        return view('track_configurations.edit', compact('tracks'))->with('trackConfiguration', $trackConfiguration);
    }

    /**
     * Update the specified TrackConfiguration in storage.
     *
     * @param  int              $id
     * @param UpdateTrackConfigurationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTrackConfigurationRequest $request)
    {
        $trackConfiguration = $this->trackConfigurationRepository->findWithoutFail($id);

        if (empty($trackConfiguration)) {
            Flash::error('Track Configuration not found');

            return redirect(route('trackConfigurations.index'));
        }

        $trackConfiguration = $this->trackConfigurationRepository->update($request->all(), $id);

        Flash::success('Track Configuration updated successfully.');

        return redirect(route('trackConfigurations.index'));
    }

    /**
     * Remove the specified TrackConfiguration from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $trackConfiguration = $this->trackConfigurationRepository->findWithoutFail($id);

        if (empty($trackConfiguration)) {
            Flash::error('Track Configuration not found');

            return redirect(route('trackConfigurations.index'));
        }

        $this->trackConfigurationRepository->delete($id);

        Flash::success('Track Configuration deleted successfully.');

        return redirect(route('trackConfigurations.index'));
    }
}
