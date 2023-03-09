<?php

namespace App\Http\Controllers;

use App\DataTables\RessourcesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRessourcesRequest;
use App\Http\Requests\UpdateRessourcesRequest;
use App\Repositories\RessourcesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RessourcesController extends AppBaseController
{
    /** @var  RessourcesRepository */
    private $ressourcesRepository;

    public function __construct(RessourcesRepository $ressourcesRepo)
    {
        $this->ressourcesRepository = $ressourcesRepo;
    }

    /**
     * Display a listing of the Ressources.
     *
     * @param RessourcesDataTable $ressourcesDataTable
     * @return Response
     */
    public function index(RessourcesDataTable $ressourcesDataTable)
    {
        return $ressourcesDataTable->render('ressources.index');
    }

    /**
     * Show the form for creating a new Ressources.
     *
     * @return Response
     */
    public function create()
    {
        return view('ressources.create');
    }

    /**
     * Store a newly created Ressources in storage.
     *
     * @param CreateRessourcesRequest $request
     *
     * @return Response
     */
    public function store(CreateRessourcesRequest $request)
    {
        $input = $request->all();

        $ressources = $this->ressourcesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ressources.singular')]));

        return redirect(route('ressources.index'));
    }

    /**
     * Display the specified Ressources.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        return view('ressources.show')->with('ressources', $ressources);
    }

    /**
     * Show the form for editing the specified Ressources.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        return view('ressources.edit')->with('ressources', $ressources);
    }

    /**
     * Update the specified Ressources in storage.
     *
     * @param  int              $id
     * @param UpdateRessourcesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRessourcesRequest $request)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        $ressources = $this->ressourcesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ressources.singular')]));

        return redirect(route('ressources.index'));
    }

    /**
     * Remove the specified Ressources from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        $this->ressourcesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ressources.singular')]));

        return redirect(route('ressources.index'));
    }
}
