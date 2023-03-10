<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_materiauxDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_materiauxRequest;
use App\Http\Requests\UpdateModele_materiauxRequest;
use App\Repositories\Modele_materiauxRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_materiauxController extends AppBaseController
{
    /** @var  Modele_materiauxRepository */
    private $modeleMateriauxRepository;

    public function __construct(Modele_materiauxRepository $modeleMateriauxRepo)
    {
        $this->modeleMateriauxRepository = $modeleMateriauxRepo;
    }

    /**
     * Display a listing of the Modele_materiaux.
     *
     * @param Modele_materiauxDataTable $modeleMateriauxDataTable
     * @return Response
     */
    public function index(Modele_materiauxDataTable $modeleMateriauxDataTable)
    {
        return $modeleMateriauxDataTable->render('modele_materiauxes.index');
    }

    /**
     * Show the form for creating a new Modele_materiaux.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_materiauxes.create');
    }

    /**
     * Store a newly created Modele_materiaux in storage.
     *
     * @param CreateModele_materiauxRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_materiauxRequest $request)
    {
        $input = $request->all();

        $modeleMateriaux = $this->modeleMateriauxRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modeleMateriauxes.singular')]));

        return redirect(route('modeleMateriauxes.index'));
    }

    /**
     * Display the specified Modele_materiaux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        return view('modele_materiauxes.show')->with('modeleMateriaux', $modeleMateriaux);
    }

    /**
     * Show the form for editing the specified Modele_materiaux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        return view('modele_materiauxes.edit')->with('modeleMateriaux', $modeleMateriaux);
    }

    /**
     * Update the specified Modele_materiaux in storage.
     *
     * @param  int              $id
     * @param UpdateModele_materiauxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_materiauxRequest $request)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        $modeleMateriaux = $this->modeleMateriauxRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleMateriauxes.singular')]));

        return redirect(route('modeleMateriauxes.index'));
    }

    /**
     * Remove the specified Modele_materiaux from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        $this->modeleMateriauxRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleMateriauxes.singular')]));

        return redirect(route('modeleMateriauxes.index'));
    }
}
