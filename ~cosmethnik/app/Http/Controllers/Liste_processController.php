<?php

namespace App\Http\Controllers;

use App\DataTables\Liste_processDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateListe_processRequest;
use App\Http\Requests\UpdateListe_processRequest;
use App\Repositories\Liste_processRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Liste_processController extends AppBaseController
{
    /** @var  Liste_processRepository */
    private $listeProcessRepository;

    public function __construct(Liste_processRepository $listeProcessRepo)
    {
        $this->listeProcessRepository = $listeProcessRepo;
    }

    /**
     * Display a listing of the Liste_process.
     *
     * @param Liste_processDataTable $listeProcessDataTable
     * @return Response
     */
    public function index(Liste_processDataTable $listeProcessDataTable)
    {
        return $listeProcessDataTable->render('liste_processes.index');
    }

    /**
     * Show the form for creating a new Liste_process.
     *
     * @return Response
     */
    public function create()
    {
        return view('liste_processes.create');
    }

    /**
     * Store a newly created Liste_process in storage.
     *
     * @param CreateListe_processRequest $request
     *
     * @return Response
     */
    public function store(CreateListe_processRequest $request)
    {
        $input = $request->all();

        $listeProcess = $this->listeProcessRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/listeProcesses.singular')]));

        return redirect(route('listeProcesses.index'));
    }

    /**
     * Display the specified Liste_process.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        return view('liste_processes.show')->with('listeProcess', $listeProcess);
    }

    /**
     * Show the form for editing the specified Liste_process.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        return view('liste_processes.edit')->with('listeProcess', $listeProcess);
    }

    /**
     * Update the specified Liste_process in storage.
     *
     * @param  int              $id
     * @param UpdateListe_processRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateListe_processRequest $request)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        $listeProcess = $this->listeProcessRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/listeProcesses.singular')]));

        return redirect(route('listeProcesses.index'));
    }

    /**
     * Remove the specified Liste_process from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        $this->listeProcessRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/listeProcesses.singular')]));

        return redirect(route('listeProcesses.index'));
    }
}
