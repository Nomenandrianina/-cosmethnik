<?php

namespace App\Http\Controllers;

use App\DataTables\FichiersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFichiersRequest;
use App\Http\Requests\UpdateFichiersRequest;
use App\Repositories\FichiersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FichiersController extends AppBaseController
{
    /** @var  FichiersRepository */
    private $fichiersRepository;

    public function __construct(FichiersRepository $fichiersRepo)
    {
        $this->fichiersRepository = $fichiersRepo;
    }

    /**
     * Display a listing of the Fichiers.
     *
     * @param FichiersDataTable $fichiersDataTable
     * @return Response
     */
    public function index(FichiersDataTable $fichiersDataTable)
    {
        return $fichiersDataTable->render('fichiers.index');
    }

    /**
     * Show the form for creating a new Fichiers.
     *
     * @return Response
     */
    public function create()
    {
        return view('fichiers.create');
    }

    /**
     * Store a newly created Fichiers in storage.
     *
     * @param CreateFichiersRequest $request
     *
     * @return Response
     */
    public function store(CreateFichiersRequest $request)
    {
        $input = $request->all();

        $fichiers = $this->fichiersRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fichiers.singular')]));

        return redirect(route('fichiers.index'));
    }

    /**
     * Display the specified Fichiers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        return view('fichiers.show')->with('fichiers', $fichiers);
    }

    /**
     * Show the form for editing the specified Fichiers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        return view('fichiers.edit')->with('fichiers', $fichiers);
    }

    /**
     * Update the specified Fichiers in storage.
     *
     * @param  int              $id
     * @param UpdateFichiersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFichiersRequest $request)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        $fichiers = $this->fichiersRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/fichiers.singular')]));

        return redirect(route('fichiers.index'));
    }

    /**
     * Remove the specified Fichiers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        $this->fichiersRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/fichiers.singular')]));

        return redirect(route('fichiers.index'));
    }
}
