<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRaceAPIRequest;
use App\Http\Requests\API\UpdateRaceAPIRequest;
use App\Models\Race;
use App\Repositories\RaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RaceController
 * @package App\Http\Controllers\API
 */

class RaceAPIController extends AppBaseController
{
    /** @var  RaceRepository */
    private $raceRepository;

    public function __construct(RaceRepository $raceRepo)
    {
        $this->raceRepository = $raceRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/races",
     *      summary="Get a listing of the Races.",
     *      tags={"Race"},
     *      description="Get all Races",
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
     *                  @SWG\Items(ref="#/definitions/Race")
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
        $this->raceRepository->pushCriteria(new RequestCriteria($request));
        $this->raceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $races = $this->raceRepository->all();

        return $this->sendResponse($races->toArray(), 'Races retrieved successfully');
    }

    /**
     * @param CreateRaceAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/races",
     *      summary="Store a newly created Race in storage",
     *      tags={"Race"},
     *      description="Store Race",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Race that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Race")
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
     *                  ref="#/definitions/Race"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateRaceAPIRequest $request)
    {
        $input = $request->all();

        $races = $this->raceRepository->create($input);

        return $this->sendResponse($races->toArray(), 'Race saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/races/{id}",
     *      summary="Display the specified Race",
     *      tags={"Race"},
     *      description="Get Race",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Race",
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
     *                  ref="#/definitions/Race"
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
        /** @var Race $race */
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            return $this->sendError('Race not found');
        }

        return $this->sendResponse($race->toArray(), 'Race retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateRaceAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/races/{id}",
     *      summary="Update the specified Race in storage",
     *      tags={"Race"},
     *      description="Update Race",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Race",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Race that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Race")
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
     *                  ref="#/definitions/Race"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateRaceAPIRequest $request)
    {
        $input = $request->all();

        /** @var Race $race */
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            return $this->sendError('Race not found');
        }

        $race = $this->raceRepository->update($input, $id);

        return $this->sendResponse($race->toArray(), 'Race updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/races/{id}",
     *      summary="Remove the specified Race from storage",
     *      tags={"Race"},
     *      description="Delete Race",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Race",
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
        /** @var Race $race */
        $race = $this->raceRepository->findWithoutFail($id);

        if (empty($race)) {
            return $this->sendError('Race not found');
        }

        $race->delete();

        return $this->sendResponse($id, 'Race deleted successfully');
    }
}
