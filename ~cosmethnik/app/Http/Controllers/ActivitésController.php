<?php

namespace App\Http\Controllers;

use App\DataTables\ActivitésDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateActivitésRequest;
use App\Http\Requests\UpdateActivitésRequest;
use App\Repositories\ActivitésRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ActivitésController extends AppBaseController
{
    /** @var  ActivitésRepository */
    private $activitésRepository;

    public function __construct(ActivitésRepository $activitésRepo)
    {
        $this->activitésRepository = $activitésRepo;
    }

    /**
     * Display a listing of the Activités.
     *
     * @param ActivitésDataTable $activitésDataTable
     * @return Response
     */
    public function index(ActivitésDataTable $activitésDataTable)
    {
        return $activitésDataTable->render('activités.index');
    }

    /**
     * Show the form for creating a new Activités.
     *
     * @return Response
     */
    public function create()
    {
        return view('activités.create');
    }

    /**
     * Store a newly created Activités in storage.
     *
     * @param CreateActivitésRequest $request
     *
     * @return Response
     */
    public function store(CreateActivitésRequest $request)
    {
        $input = $request->all();

        $activités = $this->activitésRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/activités.singular')]));

        return redirect(route('activités.index'));
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
        $activités = $this->activitésRepository->find($id);

        if (empty($activités)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activités.index'));
        }

        return view('activités.show')->with('activités', $activités);
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
        $activités = $this->activitésRepository->find($id);

        if (empty($activités)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activités.index'));
        }

        return view('activités.edit')->with('activités', $activités);
    }

    /**
     * Update the specified Activités in storage.
     *
     * @param  int              $id
     * @param UpdateActivitésRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateActivitésRequest $request)
    {
        $activités = $this->activitésRepository->find($id);

        if (empty($activités)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activités.index'));
        }

        $activités = $this->activitésRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/activités.singular')]));

        return redirect(route('activités.index'));
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
        $activités = $this->activitésRepository->find($id);

        if (empty($activités)) {
            Flash::error(__('messages.not_found', ['model' => __('models/activités.singular')]));

            return redirect(route('activités.index'));
        }

        $this->activitésRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/activités.singular')]));

        return redirect(route('activités.index'));
    }
}
