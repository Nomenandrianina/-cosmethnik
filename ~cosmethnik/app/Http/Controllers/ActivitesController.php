<?php

namespace App\Http\Controllers;

use App\DataTables\ActivitesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateActivitesRequest;
use App\Http\Requests\UpdateActivitesRequest;
use App\Repositories\ActivitesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ActivitesController extends AppBaseController
{
    /** @var  ActivitesRepository */
    private $activitesRepository;

    public function __construct(ActivitesRepository $activitesRepo)
    {
        $this->activitesRepository = $activitesRepo;
    }

    /**
     * Display a listing of the Activités.
     *
     * @param ActivitésDataTable $activitésDataTable
     * @return Response
     */
    public function index(ActivitesDataTable $activitesDataTable)
    {
        return $activitesDataTable->render('activites.index');
    }

    /**
     * Show the form for creating a new Activités.
     *
     * @return Response
     */
    public function create()
    {
        return view('activites.create');
    }

    /**
     * Store a newly created Activités in storage.
     *
     * @param CreateActivitesRequest $request
     *
     * @return Response
     */
    public function store(CreateActivitesRequest $request)
    {
        $input = $request->all();

        $activités = $this->activitesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/activités.singular')]));

        return redirect(route('activites.index'));
    }

    /**
     * Display the specified Activités.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $activités = $this->activitesRepository->find($id);

        if (empty($activités)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activites.index'));
        }

        return view('activites.show')->with('activites', $activités);
    }

    /**
     * Show the form for editing the specified Activités.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $activites = $this->activitesRepository->find($id);

        if (empty($activites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activites.index'));
        }

        return view('activites.edit')->with('activites', $activites);
    }

    /**
     * Update the specified Activités in storage.
     *
     * @param  int              $id
     * @param UpdateActivitesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivitesRequest $request)
    {
        $activités = $this->activitesRepository->find($id);

        if (empty($activités)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activités.index'));
        }

        $activités = $this->activitesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/activités.singular')]));

        return redirect(route('activites.index'));
    }

    /**
     * Remove the specified Activités from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $activites = $this->activitesRepository->find($id);

        if (empty($activites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activites.index'));
        }

        $this->activitesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/activités.singular')]));

        return redirect(route('activites.index'));
    }
}
