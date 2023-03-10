<?php

namespace App\Http\Controllers;

use App\DataTables\Cas_emploiesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCas_emploiesRequest;
use App\Http\Requests\UpdateCas_emploiesRequest;
use App\Repositories\Cas_emploiesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Cas_emploiesController extends AppBaseController
{
    /** @var  Cas_emploiesRepository */
    private $casEmploiesRepository;

    public function __construct(Cas_emploiesRepository $casEmploiesRepo)
    {
        $this->casEmploiesRepository = $casEmploiesRepo;
    }

    /**
     * Display a listing of the Cas_emploies.
     *
     * @param Cas_emploiesDataTable $casEmploiesDataTable
     * @return Response
     */
    public function index(Cas_emploiesDataTable $casEmploiesDataTable)
    {
        return $casEmploiesDataTable->render('cas_emploies.index');
    }

    /**
     * Show the form for creating a new Cas_emploies.
     *
     * @return Response
     */
    public function create()
    {
        return view('cas_emploies.create');
    }

    /**
     * Store a newly created Cas_emploies in storage.
     *
     * @param CreateCas_emploiesRequest $request
     *
     * @return Response
     */
    public function store(CreateCas_emploiesRequest $request)
    {
        $input = $request->all();

        $casEmploies = $this->casEmploiesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/casEmploies.singular')]));

        return redirect(route('casEmploies.index'));
    }

    /**
     * Display the specified Cas_emploies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $casEmploies = $this->casEmploiesRepository->find($id);

        if (empty($casEmploies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/casEmploies.singular')]));

            return redirect(route('casEmploies.index'));
        }

        return view('cas_emploies.show')->with('casEmploies', $casEmploies);
    }

    /**
     * Show the form for editing the specified Cas_emploies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $casEmploies = $this->casEmploiesRepository->find($id);

        if (empty($casEmploies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/casEmploies.singular')]));

            return redirect(route('casEmploies.index'));
        }

        return view('cas_emploies.edit')->with('casEmploies', $casEmploies);
    }

    /**
     * Update the specified Cas_emploies in storage.
     *
     * @param  int              $id
     * @param UpdateCas_emploiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCas_emploiesRequest $request)
    {
        $casEmploies = $this->casEmploiesRepository->find($id);

        if (empty($casEmploies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/casEmploies.singular')]));

            return redirect(route('casEmploies.index'));
        }

        $casEmploies = $this->casEmploiesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/casEmploies.singular')]));

        return redirect(route('casEmploies.index'));
    }

    /**
     * Remove the specified Cas_emploies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $casEmploies = $this->casEmploiesRepository->find($id);

        if (empty($casEmploies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/casEmploies.singular')]));

            return redirect(route('casEmploies.index'));
        }

        $this->casEmploiesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/casEmploies.singular')]));

        return redirect(route('casEmploies.index'));
    }
}
