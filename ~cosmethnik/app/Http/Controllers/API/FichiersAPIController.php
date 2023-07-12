<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFichiersAPIRequest;
use App\Http\Requests\API\UpdateFichiersAPIRequest;
use App\Models\Fichiers;
use App\Repositories\FichiersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FichiersController
 * @package App\Http\Controllers\API
 */

class FichiersAPIController extends AppBaseController
{
    /** @var  FichiersRepository */
    private $fichiersRepository;

    public function __construct(FichiersRepository $fichiersRepo)
    {
        $this->fichiersRepository = $fichiersRepo;
    }

    /**
     * Display a listing of the Fichiers.
     * GET|HEAD /fichiers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fichiers = $this->fichiersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(
            $fichiers->toArray(),
            __('messages.retrieved', ['model' => __('models/fichiers.plural')])
        );
    }

    /**
     * Store a newly created Fichiers in storage.
     * POST /fichiers
     *
     * @param CreateFichiersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFichiersAPIRequest $request)
    {
        $input = $request->all();

        $fichiers = $this->fichiersRepository->create($input);

        return $this->sendResponse(
            $fichiers->toArray(),
            __('messages.saved', ['model' => __('models/fichiers.singular')])
        );
    }

    /**
     * Display the specified Fichiers.
     * GET|HEAD /fichiers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Fichiers $fichiers */
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fichiers.singular')])
            );
        }

        return $this->sendResponse(
            $fichiers->toArray(),
            __('messages.retrieved', ['model' => __('models/fichiers.singular')])
        );
    }

    /**
     * Update the specified Fichiers in storage.
     * PUT/PATCH /fichiers/{id}
     *
     * @param int $id
     * @param UpdateFichiersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFichiersAPIRequest $request)
    {
        $input = $request->all();

        /** @var Fichiers $fichiers */
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fichiers.singular')])
            );
        }

        $fichiers = $this->fichiersRepository->update($input, $id);

        return $this->sendResponse(
            $fichiers->toArray(),
            __('messages.updated', ['model' => __('models/fichiers.singular')])
        );
    }

    /**
     * Remove the specified Fichiers from storage.
     * DELETE /fichiers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Fichiers $fichiers */
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            return $this->sendError(
                __('messages.not_found', ['model' => __('models/fichiers.singular')])
            );
        }

        $fichiers->delete();

        return $this->sendResponse(
            $id,
            __('messages.deleted', ['model' => __('models/fichiers.singular')])
        );
    }
}
