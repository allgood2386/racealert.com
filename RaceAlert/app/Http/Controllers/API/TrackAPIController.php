<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTrackAPIRequest;
use App\Http\Requests\API\UpdateTrackAPIRequest;
use App\Models\Track;
use App\Repositories\TrackRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TrackController
 * @package App\Http\Controllers\API
 */

class TrackAPIController extends AppBaseController
{
    /** @var  TrackRepository */
    private $trackRepository;

    public function __construct(TrackRepository $trackRepo)
    {
        $this->trackRepository = $trackRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tracks",
     *      summary="Get a listing of the Tracks.",
     *      tags={"Track"},
     *      description="Get all Tracks",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Track")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->trackRepository->pushCriteria(new RequestCriteria($request));
        $this->trackRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tracks = $this->trackRepository->all();

        return $this->sendResponse($tracks->toArray(), 'Tracks retrieved successfully');
    }

    /**
     * @param CreateTrackAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tracks",
     *      summary="Store a newly created Track in storage",
     *      tags={"Track"},
     *      description="Store Track",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Track that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Track")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Track"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTrackAPIRequest $request)
    {
        $input = $request->all();

        $tracks = $this->trackRepository->create($input);

        return $this->sendResponse($tracks->toArray(), 'Track saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tracks/{id}",
     *      summary="Display the specified Track",
     *      tags={"Track"},
     *      description="Get Track",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Track",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Track"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Track $track */
        $track = $this->trackRepository->findWithoutFail($id);

        if (empty($track)) {
            return $this->sendError('Track not found');
        }

        return $this->sendResponse($track->toArray(), 'Track retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTrackAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tracks/{id}",
     *      summary="Update the specified Track in storage",
     *      tags={"Track"},
     *      description="Update Track",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Track",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Track that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Track")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Track"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTrackAPIRequest $request)
    {
        $input = $request->all();

        /** @var Track $track */
        $track = $this->trackRepository->findWithoutFail($id);

        if (empty($track)) {
            return $this->sendError('Track not found');
        }

        $track = $this->trackRepository->update($input, $id);

        return $this->sendResponse($track->toArray(), 'Track updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tracks/{id}",
     *      summary="Remove the specified Track from storage",
     *      tags={"Track"},
     *      description="Delete Track",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Track",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Track $track */
        $track = $this->trackRepository->findWithoutFail($id);

        if (empty($track)) {
            return $this->sendError('Track not found');
        }

        $track->delete();

        return $this->sendResponse($id, 'Track deleted successfully');
    }
}
