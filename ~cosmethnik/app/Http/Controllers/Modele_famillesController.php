<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_famillesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_famillesRequest;
use App\Http\Requests\UpdateModele_famillesRequest;
use App\Repositories\Modele_famillesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_famillesController extends AppBaseController
{
    /** @var  Modele_famillesRepository */
    private $modeleFamillesRepository;

    public function __construct(Modele_famillesRepository $modeleFamillesRepo)
    {
        $this->modeleFamillesRepository = $modeleFamillesRepo;
    }

    /**
     * Display a listing of the Modele_familles.
     *
     * @param Modele_famillesDataTable $modeleFamillesDataTable
     * @return Response
     */
    public function index(Modele_famillesDataTable $modeleFamillesDataTable)
    {
        return $modeleFamillesDataTable->render('modele_familles.index');
    }

    /**
     * Show the form for creating a new Modele_familles.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_familles.create');
    }

    /**
     * Store a newly created Modele_familles in storage.
     *
     * @param CreateModele_famillesRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_famillesRequest $request)
    {
        $input = $request->all();

        $modeleFamilles = $this->modeleFamillesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modeleFamilles.singular')]));

        return redirect(route('modeleFamilles.index'));
    }

    /**
     * Display the specified Modele_familles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleFamilles = $this->modeleFamillesRepository->find($id);

        if (empty($modeleFamilles)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleFamilles.singular')]));

            return redirect(route('modeleFamilles.index'));
        }

        return view('modele_familles.show')->with('modeleFamilles', $modeleFamilles);
    }

    /**
     * Show the form for editing the specified Modele_familles.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleFamilles = $this->modeleFamillesRepository->find($id);

        if (empty($modeleFamilles)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleFamilles.singular')]));

            return redirect(route('modeleFamilles.index'));
        }

        return view('modele_familles.edit')->with('modeleFamilles', $modeleFamilles);
    }

    /**
     * Update the specified Modele_familles in storage.
     *
     * @param  int              $id
     * @param UpdateModele_famillesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_famillesRequest $request)
    {
        $modeleFamilles = $this->modeleFamillesRepository->find($id);

        if (empty($modeleFamilles)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleFamilles.singular')]));

            return redirect(route('modeleFamilles.index'));
        }

        $modeleFamilles = $this->modeleFamillesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleFamilles.singular')]));

        return redirect(route('modeleFamilles.index'));
    }

    /**
     * Remove the specified Modele_familles from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleFamilles = $this->modeleFamillesRepository->find($id);

        if (empty($modeleFamilles)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleFamilles.singular')]));

            return redirect(route('modeleFamilles.index'));
        }

        $this->modeleFamillesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleFamilles.singular')]));

        return redirect(route('modeleFamilles.index'));
    }
}
