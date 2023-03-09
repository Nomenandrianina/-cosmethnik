<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_emballagesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_emballagesRequest;
use App\Http\Requests\UpdateModele_emballagesRequest;
use App\Repositories\Modele_emballagesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_emballagesController extends AppBaseController
{
    /** @var  Modele_emballagesRepository */
    private $modeleEmballagesRepository;

    public function __construct(Modele_emballagesRepository $modeleEmballagesRepo)
    {
        $this->modeleEmballagesRepository = $modeleEmballagesRepo;
    }

    /**
     * Display a listing of the Modele_emballages.
     *
     * @param Modele_emballagesDataTable $modeleEmballagesDataTable
     * @return Response
     */
    public function index(Modele_emballagesDataTable $modeleEmballagesDataTable)
    {
        return $modeleEmballagesDataTable->render('modele_emballages.index');
    }

    /**
     * Show the form for creating a new Modele_emballages.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_emballages.create');
    }

    /**
     * Store a newly created Modele_emballages in storage.
     *
     * @param CreateModele_emballagesRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_emballagesRequest $request)
    {
        $input = $request->all();

        $modeleEmballages = $this->modeleEmballagesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modeleEmballages.singular')]));

        return redirect(route('modeleEmballages.index'));
    }

    /**
     * Display the specified Modele_emballages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleEmballages = $this->modeleEmballagesRepository->find($id);

        if (empty($modeleEmballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleEmballages.singular')]));

            return redirect(route('modeleEmballages.index'));
        }

        return view('modele_emballages.show')->with('modeleEmballages', $modeleEmballages);
    }

    /**
     * Show the form for editing the specified Modele_emballages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleEmballages = $this->modeleEmballagesRepository->find($id);

        if (empty($modeleEmballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleEmballages.singular')]));

            return redirect(route('modeleEmballages.index'));
        }

        return view('modele_emballages.edit')->with('modeleEmballages', $modeleEmballages);
    }

    /**
     * Update the specified Modele_emballages in storage.
     *
     * @param  int              $id
     * @param UpdateModele_emballagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_emballagesRequest $request)
    {
        $modeleEmballages = $this->modeleEmballagesRepository->find($id);

        if (empty($modeleEmballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleEmballages.singular')]));

            return redirect(route('modeleEmballages.index'));
        }

        $modeleEmballages = $this->modeleEmballagesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleEmballages.singular')]));

        return redirect(route('modeleEmballages.index'));
    }

    /**
     * Remove the specified Modele_emballages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleEmballages = $this->modeleEmballagesRepository->find($id);

        if (empty($modeleEmballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleEmballages.singular')]));

            return redirect(route('modeleEmballages.index'));
        }

        $this->modeleEmballagesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleEmballages.singular')]));

        return redirect(route('modeleEmballages.index'));
    }
}
