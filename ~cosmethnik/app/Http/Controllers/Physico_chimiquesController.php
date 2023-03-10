<?php

namespace App\Http\Controllers;

use App\DataTables\Physico_chimiquesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePhysico_chimiquesRequest;
use App\Http\Requests\UpdatePhysico_chimiquesRequest;
use App\Repositories\Physico_chimiquesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Physico_chimiquesController extends AppBaseController
{
    /** @var  Physico_chimiquesRepository */
    private $physicoChimiquesRepository;

    public function __construct(Physico_chimiquesRepository $physicoChimiquesRepo)
    {
        $this->physicoChimiquesRepository = $physicoChimiquesRepo;
    }

    /**
     * Display a listing of the Physico_chimiques.
     *
     * @param Physico_chimiquesDataTable $physicoChimiquesDataTable
     * @return Response
     */
    public function index(Physico_chimiquesDataTable $physicoChimiquesDataTable)
    {
        return $physicoChimiquesDataTable->render('physico_chimiques.index');
    }

    /**
     * Show the form for creating a new Physico_chimiques.
     *
     * @return Response
     */
    public function create()
    {
        return view('physico_chimiques.create');
    }

    /**
     * Store a newly created Physico_chimiques in storage.
     *
     * @param CreatePhysico_chimiquesRequest $request
     *
     * @return Response
     */
    public function store(CreatePhysico_chimiquesRequest $request)
    {
        $input = $request->all();

        $physicoChimiques = $this->physicoChimiquesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/physicoChimiques.singular')]));

        return redirect(route('physicoChimiques.index'));
    }

    /**
     * Display the specified Physico_chimiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $physicoChimiques = $this->physicoChimiquesRepository->find($id);

        if (empty($physicoChimiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/physicoChimiques.singular')]));

            return redirect(route('physicoChimiques.index'));
        }

        return view('physico_chimiques.show')->with('physicoChimiques', $physicoChimiques);
    }

    /**
     * Show the form for editing the specified Physico_chimiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $physicoChimiques = $this->physicoChimiquesRepository->find($id);

        if (empty($physicoChimiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/physicoChimiques.singular')]));

            return redirect(route('physicoChimiques.index'));
        }

        return view('physico_chimiques.edit')->with('physicoChimiques', $physicoChimiques);
    }

    /**
     * Update the specified Physico_chimiques in storage.
     *
     * @param  int              $id
     * @param UpdatePhysico_chimiquesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhysico_chimiquesRequest $request)
    {
        $physicoChimiques = $this->physicoChimiquesRepository->find($id);

        if (empty($physicoChimiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/physicoChimiques.singular')]));

            return redirect(route('physicoChimiques.index'));
        }

        $physicoChimiques = $this->physicoChimiquesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/physicoChimiques.singular')]));

        return redirect(route('physicoChimiques.index'));
    }

    /**
     * Remove the specified Physico_chimiques from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $physicoChimiques = $this->physicoChimiquesRepository->find($id);

        if (empty($physicoChimiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/physicoChimiques.singular')]));

            return redirect(route('physicoChimiques.index'));
        }

        $this->physicoChimiquesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/physicoChimiques.singular')]));

        return redirect(route('physicoChimiques.index'));
    }
}
