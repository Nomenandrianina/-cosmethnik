<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_allergenesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_allergenesRequest;
use App\Http\Requests\UpdateModele_allergenesRequest;
use App\Repositories\Modele_allergenesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_allergenesController extends AppBaseController
{
    /** @var  Modele_allergenesRepository */
    private $modeleAllergenesRepository;

    public function __construct(Modele_allergenesRepository $modeleAllergenesRepo)
    {
        $this->modeleAllergenesRepository = $modeleAllergenesRepo;
    }

    /**
     * Display a listing of the Modele_allergenes.
     *
     * @param Modele_allergenesDataTable $modeleAllergenesDataTable
     * @return Response
     */
    public function index(Modele_allergenesDataTable $modeleAllergenesDataTable)
    {
        return $modeleAllergenesDataTable->render('modele_allergenes.index');
    }

    /**
     * Show the form for creating a new Modele_allergenes.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_allergenes.create');
    }

    /**
     * Store a newly created Modele_allergenes in storage.
     *
     * @param CreateModele_allergenesRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_allergenesRequest $request)
    {
        $input = $request->all();

        $modeleAllergenes = $this->modeleAllergenesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modeleAllergenes.singular')]));

        return redirect(route('modeleAllergenes.index'));
    }

    /**
     * Display the specified Modele_allergenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        return view('modele_allergenes.show')->with('modeleAllergenes', $modeleAllergenes);
    }

    /**
     * Show the form for editing the specified Modele_allergenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        return view('modele_allergenes.edit')->with('modeleAllergenes', $modeleAllergenes);
    }

    /**
     * Update the specified Modele_allergenes in storage.
     *
     * @param  int              $id
     * @param UpdateModele_allergenesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_allergenesRequest $request)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        $modeleAllergenes = $this->modeleAllergenesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleAllergenes.singular')]));

        return redirect(route('modeleAllergenes.index'));
    }

    /**
     * Remove the specified Modele_allergenes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        $this->modeleAllergenesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleAllergenes.singular')]));

        return redirect(route('modeleAllergenes.index'));
    }
}
