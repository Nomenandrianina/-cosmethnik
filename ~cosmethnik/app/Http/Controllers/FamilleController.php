<?php

namespace App\Http\Controllers;

use App\DataTables\FamilleDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFamilleRequest;
use App\Http\Requests\UpdateFamilleRequest;
use App\Repositories\FamilleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FamilleController extends AppBaseController
{
    /** @var  FamilleRepository */
    private $familleRepository;

    public function __construct(FamilleRepository $familleRepo)
    {
        $this->familleRepository = $familleRepo;
    }

    /**
     * Display a listing of the Famille.
     *
     * @param FamilleDataTable $familleDataTable
     * @return Response
     */
    public function index(FamilleDataTable $familleDataTable)
    {
        return $familleDataTable->render('familles.index');
    }

    /**
     * Show the form for creating a new Famille.
     *
     * @return Response
     */
    public function create()
    {
        return view('familles.create');
    }

    /**
     * Store a newly created Famille in storage.
     *
     * @param CreateFamilleRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilleRequest $request)
    {
        $input = $request->all();

        $famille = $this->familleRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/familles.singular')]));

        return redirect(route('familles.index'));
    }

    /**
     * Display the specified Famille.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        return view('familles.show')->with('famille', $famille);
    }

    /**
     * Show the form for editing the specified Famille.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        return view('familles.edit')->with('famille', $famille);
    }

    /**
     * Update the specified Famille in storage.
     *
     * @param  int              $id
     * @param UpdateFamilleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilleRequest $request)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        $famille = $this->familleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/familles.singular')]));

        return redirect(route('familles.index'));
    }

    /**
     * Remove the specified Famille from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        $this->familleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/familles.singular')]));

        return redirect(route('familles.index'));
    }
}
