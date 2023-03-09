<?php

namespace App\Http\Controllers;

use App\DataTables\Precaution_emploiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePrecaution_emploiRequest;
use App\Http\Requests\UpdatePrecaution_emploiRequest;
use App\Repositories\Precaution_emploiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Precaution_emploiController extends AppBaseController
{
    /** @var  Precaution_emploiRepository */
    private $precautionEmploiRepository;

    public function __construct(Precaution_emploiRepository $precautionEmploiRepo)
    {
        $this->precautionEmploiRepository = $precautionEmploiRepo;
    }

    /**
     * Display a listing of the Precaution_emploi.
     *
     * @param Precaution_emploiDataTable $precautionEmploiDataTable
     * @return Response
     */
    public function index(Precaution_emploiDataTable $precautionEmploiDataTable)
    {
        return $precautionEmploiDataTable->render('precaution_emplois.index');
    }

    /**
     * Show the form for creating a new Precaution_emploi.
     *
     * @return Response
     */
    public function create()
    {
        return view('precaution_emplois.create');
    }

    /**
     * Store a newly created Precaution_emploi in storage.
     *
     * @param CreatePrecaution_emploiRequest $request
     *
     * @return Response
     */
    public function store(CreatePrecaution_emploiRequest $request)
    {
        $input = $request->all();

        $precautionEmploi = $this->precautionEmploiRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/precautionEmplois.singular')]));

        return redirect(route('precautionEmplois.index'));
    }

    /**
     * Display the specified Precaution_emploi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $precautionEmploi = $this->precautionEmploiRepository->find($id);

        if (empty($precautionEmploi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/precautionEmplois.singular')]));

            return redirect(route('precautionEmplois.index'));
        }

        return view('precaution_emplois.show')->with('precautionEmploi', $precautionEmploi);
    }

    /**
     * Show the form for editing the specified Precaution_emploi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $precautionEmploi = $this->precautionEmploiRepository->find($id);

        if (empty($precautionEmploi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/precautionEmplois.singular')]));

            return redirect(route('precautionEmplois.index'));
        }

        return view('precaution_emplois.edit')->with('precautionEmploi', $precautionEmploi);
    }

    /**
     * Update the specified Precaution_emploi in storage.
     *
     * @param  int              $id
     * @param UpdatePrecaution_emploiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrecaution_emploiRequest $request)
    {
        $precautionEmploi = $this->precautionEmploiRepository->find($id);

        if (empty($precautionEmploi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/precautionEmplois.singular')]));

            return redirect(route('precautionEmplois.index'));
        }

        $precautionEmploi = $this->precautionEmploiRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/precautionEmplois.singular')]));

        return redirect(route('precautionEmplois.index'));
    }

    /**
     * Remove the specified Precaution_emploi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $precautionEmploi = $this->precautionEmploiRepository->find($id);

        if (empty($precautionEmploi)) {
            Flash::error(__('messages.not_found', ['model' => __('models/precautionEmplois.singular')]));

            return redirect(route('precautionEmplois.index'));
        }

        $this->precautionEmploiRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/precautionEmplois.singular')]));

        return redirect(route('precautionEmplois.index'));
    }
}
