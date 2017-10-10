<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTrackConfigurationAPIRequest;
use App\Http\Requests\API\UpdateTrackConfigurationAPIRequest;
use App\Models\TrackConfiguration;
use App\Repositories\TrackConfigurationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TrackConfigurationController
 * @package App\Http\Controllers\API
 */

class TrackConfigurationAPIController extends AppBaseController
{
    /** @var  TrackConfigurationRepository */
    private $trackConfigurationRepository;

    public function __construct(TrackConfigurationRepository $trackConfigurationRepo)
    {
        $this->trackConfigurationRepository = $trackConfigurationRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/trackConfigurations",
     *      summary="Get a listing of the TrackConfigurations.",
     *      tags={"TrackConfiguration"},
     *      description="Get all TrackConfigurations",
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
     *                  @SWG\Items(ref="#/definitions/TrackConfiguration")
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
        $this->trackConfigurationRepository->pushCriteria(new RequestCriteria($request));
        $this->trackConfigurationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $trackConfigurations = $this->trackConfigurationRepository->all();

        return $this->sendResponse($trackConfigurations->toArray(), 'Track Configurations retrieved successfully');
    }

    /**
     * @param CreateTrackConfigurationAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/trackConfigurations",
     *      summary="Store a newly created TrackConfiguration in storage",
     *      tags={"TrackConfiguration"},
     *      description="Store TrackConfiguration",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TrackConfiguration that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TrackConfiguration")
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
     *                  ref="#/definitions/TrackConfiguration"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTrackConfigurationAPIRequest $request)
    {
        $input = $request->all();

        $trackConfigurations = $this->trackConfigurationRepository->create($input);

        return $this->sendResponse($trackConfigurations->toArray(), 'Track Configuration saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/trackConfigurations/{id}",
     *      summary="Display the specified TrackConfiguration",
     *      tags={"TrackConfiguration"},
     *      description="Get TrackConfiguration",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TrackConfiguration",
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
     *                  ref="#/definitions/TrackConfiguration"
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
        /** @var TrackConfiguration $trackConfiguration */
        $trackConfiguration = $this->trackConfigurationRepository->findWithoutFail($id);

        if (empty($trackConfiguration)) {
            return $this->sendError('Track Configuration not found');
        }

        return $this->sendResponse($trackConfiguration->toArray(), 'Track Configuration retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTrackConfigurationAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/trackConfigurations/{id}",
     *      summary="Update the specified TrackConfiguration in storage",
     *      tags={"TrackConfiguration"},
     *      description="Update TrackConfiguration",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TrackConfiguration",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TrackConfiguration that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TrackConfiguration")
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
     *                  ref="#/definitions/TrackConfiguration"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTrackConfigurationAPIRequest $request)
    {
        $input = $request->all();

        /** @var TrackConfiguration $trackConfiguration */
        $trackConfiguration = $this->trackConfigurationRepository->findWithoutFail($id);

        if (empty($trackConfiguration)) {
            return $this->sendError('Track Configuration not found');
        }

        $trackConfiguration = $this->trackConfigurationRepository->update($input, $id);

        return $this->sendResponse($trackConfiguration->toArray(), 'TrackConfiguration updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/trackConfigurations/{id}",
     *      summary="Remove the specified TrackConfiguration from storage",
     *      tags={"TrackConfiguration"},
     *      description="Delete TrackConfiguration",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TrackConfiguration",
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
        /** @var TrackConfiguration $trackConfiguration */
        $trackConfiguration = $this->trackConfigurationRepository->findWithoutFail($id);

        if (empty($trackConfiguration)) {
            return $this->sendError('Track Configuration not found');
        }

        $trackConfiguration->delete();

        return $this->sendResponse($id, 'Track Configuration deleted successfully');
    }
}
