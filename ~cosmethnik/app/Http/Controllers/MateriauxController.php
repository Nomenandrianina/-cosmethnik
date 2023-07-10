<?php

namespace App\Http\Controllers;

use App\DataTables\MateriauxDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMateriauxRequest;
use App\Http\Requests\UpdateMateriauxRequest;
use App\Repositories\MateriauxRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MateriauxController extends AppBaseController
{
    /** @var  MateriauxRepository */
    private $materiauxRepository;

    public function __construct(MateriauxRepository $materiauxRepo)
    {
        $this->materiauxRepository = $materiauxRepo;
    }

    /**
     * Display a listing of the Materiaux.
     *
     * @param MateriauxDataTable $materiauxDataTable
     * @return Response
     */
    public function index(MateriauxDataTable $materiauxDataTable)
    {
        return $materiauxDataTable->render('materiaux.index');
    }

    /**
     * Show the form for creating a new Materiaux.
     *
     * @return Response
     */
    public function create()
    {
        return view('materiaux.create');
    }

    /**
     * Store a newly created Materiaux in storage.
     *
     * @param CreateMateriauxRequest $request
     *
     * @return Response
     */
    public function store(CreateMateriauxRequest $request)
    {
        $input = $request->all();

        $materiaux = $this->materiauxRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/materiaux.singular')]));

        return redirect(route('materiauxes.index'));
    }

    /**
     * Display the specified Materiaux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materiaux = $this->materiauxRepository->find($id);

        if (empty($materiaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/materiaux.singular')]));

            return redirect(route('materiauxes.index'));
        }

        return view('materiaux.show')->with('materiaux', $materiaux);
    }

    /**
     * Show the form for editing the specified Materiaux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materiaux = $this->materiauxRepository->find($id);

        if (empty($materiaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/materiaux.singular')]));

            return redirect(route('materiauxes.index'));
        }

        return view('materiaux.edit')->with('materiaux', $materiaux);
    }

    /**
     * Update the specified Materiaux in storage.
     *
     * @param  int              $id
     * @param UpdateMateriauxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMateriauxRequest $request)
    {
        $materiaux = $this->materiauxRepository->find($id);

        if (empty($materiaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/materiaux.singular')]));

            return redirect(route('materiauxes.index'));
        }

        $materiaux = $this->materiauxRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/materiaux.singular')]));

        return redirect(route('materiauxes.index'));
    }

    /**
     * Remove the specified Materiaux from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materiaux = $this->materiauxRepository->find($id);

        if (empty($materiaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/materiaux.singular')]));

            return redirect(route('materiauxes.index'));
        }

        $this->materiauxRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/materiaux.singular')]));

        return redirect(route('materiauxes.index'));
    }
}
