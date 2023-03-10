<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_physico_chimiqueDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_physico_chimiqueRequest;
use App\Http\Requests\UpdateModele_physico_chimiqueRequest;
use App\Repositories\Modele_physico_chimiqueRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_physico_chimiqueController extends AppBaseController
{
    /** @var  Modele_physico_chimiqueRepository */
    private $modelePhysicoChimiqueRepository;

    public function __construct(Modele_physico_chimiqueRepository $modelePhysicoChimiqueRepo)
    {
        $this->modelePhysicoChimiqueRepository = $modelePhysicoChimiqueRepo;
    }

    /**
     * Display a listing of the Modele_physico_chimique.
     *
     * @param Modele_physico_chimiqueDataTable $modelePhysicoChimiqueDataTable
     * @return Response
     */
    public function index(Modele_physico_chimiqueDataTable $modelePhysicoChimiqueDataTable)
    {
        return $modelePhysicoChimiqueDataTable->render('modele_physico_chimiques.index');
    }

    /**
     * Show the form for creating a new Modele_physico_chimique.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_physico_chimiques.create');
    }

    /**
     * Store a newly created Modele_physico_chimique in storage.
     *
     * @param CreateModele_physico_chimiqueRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_physico_chimiqueRequest $request)
    {
        $input = $request->all();

        $modelePhysicoChimique = $this->modelePhysicoChimiqueRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modelePhysicoChimiques.singular')]));

        return redirect(route('modelePhysicoChimiques.index'));
    }

    /**
     * Display the specified Modele_physico_chimique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modelePhysicoChimique = $this->modelePhysicoChimiqueRepository->find($id);

        if (empty($modelePhysicoChimique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelePhysicoChimiques.singular')]));

            return redirect(route('modelePhysicoChimiques.index'));
        }

        return view('modele_physico_chimiques.show')->with('modelePhysicoChimique', $modelePhysicoChimique);
    }

    /**
     * Show the form for editing the specified Modele_physico_chimique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modelePhysicoChimique = $this->modelePhysicoChimiqueRepository->find($id);

        if (empty($modelePhysicoChimique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelePhysicoChimiques.singular')]));

            return redirect(route('modelePhysicoChimiques.index'));
        }

        return view('modele_physico_chimiques.edit')->with('modelePhysicoChimique', $modelePhysicoChimique);
    }

    /**
     * Update the specified Modele_physico_chimique in storage.
     *
     * @param  int              $id
     * @param UpdateModele_physico_chimiqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_physico_chimiqueRequest $request)
    {
        $modelePhysicoChimique = $this->modelePhysicoChimiqueRepository->find($id);

        if (empty($modelePhysicoChimique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelePhysicoChimiques.singular')]));

            return redirect(route('modelePhysicoChimiques.index'));
        }

        $modelePhysicoChimique = $this->modelePhysicoChimiqueRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modelePhysicoChimiques.singular')]));

        return redirect(route('modelePhysicoChimiques.index'));
    }

    /**
     * Remove the specified Modele_physico_chimique from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modelePhysicoChimique = $this->modelePhysicoChimiqueRepository->find($id);

        if (empty($modelePhysicoChimique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modelePhysicoChimiques.singular')]));

            return redirect(route('modelePhysicoChimiques.index'));
        }

        $this->modelePhysicoChimiqueRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modelePhysicoChimiques.singular')]));

        return redirect(route('modelePhysicoChimiques.index'));
    }
}
