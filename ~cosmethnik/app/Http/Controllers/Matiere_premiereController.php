<?php

namespace App\Http\Controllers;

use App\DataTables\Matiere_premiereDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMatiere_premiereRequest;
use App\Http\Requests\UpdateMatiere_premiereRequest;
use App\Repositories\Matiere_premiereRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Matiere_premiereController extends AppBaseController
{
    /** @var  Matiere_premiereRepository */
    private $matierePremiereRepository;

    public function __construct(Matiere_premiereRepository $matierePremiereRepo)
    {
        $this->matierePremiereRepository = $matierePremiereRepo;
    }

    /**
     * Display a listing of the Matiere_premiere.
     *
     * @param Matiere_premiereDataTable $matierePremiereDataTable
     * @return Response
     */
    public function index(Matiere_premiereDataTable $matierePremiereDataTable)
    {
        return $matierePremiereDataTable->render('matiere_premieres.index');
    }

    /**
     * Show the form for creating a new Matiere_premiere.
     *
     * @return Response
     */
    public function create()
    {
        return view('matiere_premieres.create');
    }

    /**
     * Store a newly created Matiere_premiere in storage.
     *
     * @param CreateMatiere_premiereRequest $request
     *
     * @return Response
     */
    public function store(CreateMatiere_premiereRequest $request)
    {
        $input = $request->all();

        $matierePremiere = $this->matierePremiereRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/matierePremieres.singular')]));

        return redirect(route('matierePremieres.index'));
    }

    /**
     * Display the specified Matiere_premiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        return view('matiere_premieres.show')->with('matierePremiere', $matierePremiere);
    }

    /**
     * Show the form for editing the specified Matiere_premiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        return view('matiere_premieres.edit')->with('matierePremiere', $matierePremiere);
    }

    /**
     * Update the specified Matiere_premiere in storage.
     *
     * @param  int              $id
     * @param UpdateMatiere_premiereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatiere_premiereRequest $request)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        $matierePremiere = $this->matierePremiereRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/matierePremieres.singular')]));

        return redirect(route('matierePremieres.index'));
    }

    /**
     * Remove the specified Matiere_premiere from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        $this->matierePremiereRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/matierePremieres.singular')]));

        return redirect(route('matierePremieres.index'));
    }
}
