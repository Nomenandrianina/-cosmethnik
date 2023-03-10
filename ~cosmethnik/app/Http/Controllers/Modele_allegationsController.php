<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_allegationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_allegationsRequest;
use App\Http\Requests\UpdateModele_allegationsRequest;
use App\Repositories\Modele_allegationsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_allegationsController extends AppBaseController
{
    /** @var  Modele_allegationsRepository */
    private $modeleAllegationsRepository;

    public function __construct(Modele_allegationsRepository $modeleAllegationsRepo)
    {
        $this->modeleAllegationsRepository = $modeleAllegationsRepo;
    }

    /**
     * Display a listing of the Modele_allegations.
     *
     * @param Modele_allegationsDataTable $modeleAllegationsDataTable
     * @return Response
     */
    public function index(Modele_allegationsDataTable $modeleAllegationsDataTable)
    {
        return $modeleAllegationsDataTable->render('modele_allegations.index');
    }

    /**
     * Show the form for creating a new Modele_allegations.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_allegations.create');
    }

    /**
     * Store a newly created Modele_allegations in storage.
     *
     * @param CreateModele_allegationsRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_allegationsRequest $request)
    {
        $input = $request->all();

        $modeleAllegations = $this->modeleAllegationsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modeleAllegations.singular')]));

        return redirect(route('modeleAllegations.index'));
    }

    /**
     * Display the specified Modele_allegations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        return view('modele_allegations.show')->with('modeleAllegations', $modeleAllegations);
    }

    /**
     * Show the form for editing the specified Modele_allegations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        return view('modele_allegations.edit')->with('modeleAllegations', $modeleAllegations);
    }

    /**
     * Update the specified Modele_allegations in storage.
     *
     * @param  int              $id
     * @param UpdateModele_allegationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_allegationsRequest $request)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        $modeleAllegations = $this->modeleAllegationsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleAllegations.singular')]));

        return redirect(route('modeleAllegations.index'));
    }

    /**
     * Remove the specified Modele_allegations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        $this->modeleAllegationsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleAllegations.singular')]));

        return redirect(route('modeleAllegations.index'));
    }
}
