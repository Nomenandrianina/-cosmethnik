<?php

namespace App\Http\Controllers;

use App\DataTables\OrganoleptiquesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrganoleptiquesRequest;
use App\Http\Requests\UpdateOrganoleptiquesRequest;
use App\Repositories\OrganoleptiquesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrganoleptiquesController extends AppBaseController
{
    /** @var  OrganoleptiquesRepository */
    private $organoleptiquesRepository;

    public function __construct(OrganoleptiquesRepository $organoleptiquesRepo)
    {
        $this->organoleptiquesRepository = $organoleptiquesRepo;
    }

    /**
     * Display a listing of the Organoleptiques.
     *
     * @param OrganoleptiquesDataTable $organoleptiquesDataTable
     * @return Response
     */
    public function index(OrganoleptiquesDataTable $organoleptiquesDataTable)
    {
        return $organoleptiquesDataTable->render('organoleptiques.index');
    }

    /**
     * Show the form for creating a new Organoleptiques.
     *
     * @return Response
     */
    public function create()
    {
        return view('organoleptiques.create');
    }

    /**
     * Store a newly created Organoleptiques in storage.
     *
     * @param CreateOrganoleptiquesRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganoleptiquesRequest $request)
    {
        $input = $request->all();

        $organoleptiques = $this->organoleptiquesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/organoleptiques.singular')]));

        return redirect(route('organoleptiques.index'));
    }

    /**
     * Display the specified Organoleptiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $organoleptiques = $this->organoleptiquesRepository->find($id);

        if (empty($organoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/organoleptiques.singular')]));

            return redirect(route('organoleptiques.index'));
        }

        return view('organoleptiques.show')->with('organoleptiques', $organoleptiques);
    }

    /**
     * Show the form for editing the specified Organoleptiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $organoleptiques = $this->organoleptiquesRepository->find($id);

        if (empty($organoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/organoleptiques.singular')]));

            return redirect(route('organoleptiques.index'));
        }

        return view('organoleptiques.edit')->with('organoleptiques', $organoleptiques);
    }

    /**
     * Update the specified Organoleptiques in storage.
     *
     * @param  int              $id
     * @param UpdateOrganoleptiquesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganoleptiquesRequest $request)
    {
        $organoleptiques = $this->organoleptiquesRepository->find($id);

        if (empty($organoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/organoleptiques.singular')]));

            return redirect(route('organoleptiques.index'));
        }

        $organoleptiques = $this->organoleptiquesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/organoleptiques.singular')]));

        return redirect(route('organoleptiques.index'));
    }

    /**
     * Remove the specified Organoleptiques from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $organoleptiques = $this->organoleptiquesRepository->find($id);

        if (empty($organoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/organoleptiques.singular')]));

            return redirect(route('organoleptiques.index'));
        }

        $this->organoleptiquesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/organoleptiques.singular')]));

        return redirect(route('organoleptiques.index'));
    }
}
