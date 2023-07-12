<?php

namespace App\Http\Controllers;

use App\DataTables\fichiersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatefichiersRequest;
use App\Http\Requests\UpdatefichiersRequest;
use App\Repositories\fichiersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class fichiersController extends AppBaseController
{
    /** @var  fichiersRepository */
    private $fichiersRepository;

    public function __construct(fichiersRepository $fichiersRepo)
    {
        $this->fichiersRepository = $fichiersRepo;
    }

    /**
     * Display a listing of the fichiers.
     *
     * @param fichiersDataTable $fichiersDataTable
     * @return Response
     */
    public function index(fichiersDataTable $fichiersDataTable)
    {
        return $fichiersDataTable->render('fichiers.index');
    }

    /**
     * Show the form for creating a new fichiers.
     *
     * @return Response
     */
    public function create()
    {
        return view('fichiers.create');
    }

    /**
     * Store a newly created fichiers in storage.
     *
     * @param CreatefichiersRequest $request
     *
     * @return Response
     */
    public function store(CreatefichiersRequest $request)
    {
        $input = $request->all();

        $fichiers = $this->fichiersRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fichiers.singular')]));

        return redirect(route('fichiers.index'));
    }

    /**
     * Display the specified fichiers.
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
     * Show the form for editing the specified fichiers.
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
     * Update the specified fichiers in storage.
     *
     * @param  int              $id
     * @param UpdatefichiersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefichiersRequest $request)
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
     * Remove the specified fichiers from storage.
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
