<?php

namespace App\Http\Controllers;

use App\DataTables\UnitesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUnitesRequest;
use App\Http\Requests\UpdateUnitesRequest;
use App\Repositories\UnitesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UnitesController extends AppBaseController
{
    /** @var  UnitesRepository */
    private $unitesRepository;

    public function __construct(UnitesRepository $unitesRepo)
    {
        $this->unitesRepository = $unitesRepo;
    }

    /**
     * Display a listing of the Unites.
     *
     * @param UnitesDataTable $unitesDataTable
     * @return Response
     */
    public function index(UnitesDataTable $unitesDataTable)
    {
        return $unitesDataTable->render('unites.index');
    }

    /**
     * Show the form for creating a new Unites.
     *
     * @return Response
     */
    public function create()
    {
        return view('unites.create');
    }

    /**
     * Store a newly created Unites in storage.
     *
     * @param CreateUnitesRequest $request
     *
     * @return Response
     */
    public function store(CreateUnitesRequest $request)
    {
        $input = $request->all();

        $unites = $this->unitesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/unites.singular')]));

        return redirect(route('unites.index'));
    }

    /**
     * Display the specified Unites.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unites = $this->unitesRepository->find($id);

        if (empty($unites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/unites.singular')]));

            return redirect(route('unites.index'));
        }

        return view('unites.show')->with('unites', $unites);
    }

    /**
     * Show the form for editing the specified Unites.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unites = $this->unitesRepository->find($id);

        if (empty($unites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/unites.singular')]));

            return redirect(route('unites.index'));
        }

        return view('unites.edit')->with('unites', $unites);
    }

    /**
     * Update the specified Unites in storage.
     *
     * @param  int              $id
     * @param UpdateUnitesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnitesRequest $request)
    {
        $unites = $this->unitesRepository->find($id);

        if (empty($unites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/unites.singular')]));

            return redirect(route('unites.index'));
        }

        $unites = $this->unitesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/unites.singular')]));

        return redirect(route('unites.index'));
    }

    /**
     * Remove the specified Unites from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unites = $this->unitesRepository->find($id);

        if (empty($unites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/unites.singular')]));

            return redirect(route('unites.index'));
        }

        $this->unitesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/unites.singular')]));

        return redirect(route('unites.index'));
    }
}
