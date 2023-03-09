<?php

namespace App\Http\Controllers;

use App\DataTables\FilialesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFilialesRequest;
use App\Http\Requests\UpdateFilialesRequest;
use App\Repositories\FilialesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FilialesController extends AppBaseController
{
    /** @var  FilialesRepository */
    private $filialesRepository;

    public function __construct(FilialesRepository $filialesRepo)
    {
        $this->filialesRepository = $filialesRepo;
    }

    /**
     * Display a listing of the Filiales.
     *
     * @param FilialesDataTable $filialesDataTable
     * @return Response
     */
    public function index(FilialesDataTable $filialesDataTable)
    {
        return $filialesDataTable->render('filiales.index');
    }

    /**
     * Show the form for creating a new Filiales.
     *
     * @return Response
     */
    public function create()
    {
        return view('filiales.create');
    }

    /**
     * Store a newly created Filiales in storage.
     *
     * @param CreateFilialesRequest $request
     *
     * @return Response
     */
    public function store(CreateFilialesRequest $request)
    {
        $input = $request->all();

        $filiales = $this->filialesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/filiales.singular')]));

        return redirect(route('filiales.index'));
    }

    /**
     * Display the specified Filiales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $filiales = $this->filialesRepository->find($id);

        if (empty($filiales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/filiales.singular')]));

            return redirect(route('filiales.index'));
        }

        return view('filiales.show')->with('filiales', $filiales);
    }

    /**
     * Show the form for editing the specified Filiales.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $filiales = $this->filialesRepository->find($id);

        if (empty($filiales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/filiales.singular')]));

            return redirect(route('filiales.index'));
        }

        return view('filiales.edit')->with('filiales', $filiales);
    }

    /**
     * Update the specified Filiales in storage.
     *
     * @param  int              $id
     * @param UpdateFilialesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFilialesRequest $request)
    {
        $filiales = $this->filialesRepository->find($id);

        if (empty($filiales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/filiales.singular')]));

            return redirect(route('filiales.index'));
        }

        $filiales = $this->filialesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/filiales.singular')]));

        return redirect(route('filiales.index'));
    }

    /**
     * Remove the specified Filiales from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $filiales = $this->filialesRepository->find($id);

        if (empty($filiales)) {
            Flash::error(__('messages.not_found', ['model' => __('models/filiales.singular')]));

            return redirect(route('filiales.index'));
        }

        $this->filialesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/filiales.singular')]));

        return redirect(route('filiales.index'));
    }
}
