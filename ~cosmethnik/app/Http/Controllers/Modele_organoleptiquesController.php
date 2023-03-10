<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModele_organoleptiquesRequest;
use App\Http\Requests\UpdateModele_organoleptiquesRequest;
use App\Repositories\Modele_organoleptiquesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Modele_organoleptiquesController extends AppBaseController
{
    /** @var  Modele_organoleptiquesRepository */
    private $modeleOrganoleptiquesRepository;

    public function __construct(Modele_organoleptiquesRepository $modeleOrganoleptiquesRepo)
    {
        $this->modeleOrganoleptiquesRepository = $modeleOrganoleptiquesRepo;
    }

    /**
     * Display a listing of the Modele_organoleptiques.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $modeleOrganoleptiques = $this->modeleOrganoleptiquesRepository->paginate(10);

        return view('modele_organoleptiques.index')
            ->with('modeleOrganoleptiques', $modeleOrganoleptiques);
    }

    /**
     * Show the form for creating a new Modele_organoleptiques.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_organoleptiques.create');
    }

    /**
     * Store a newly created Modele_organoleptiques in storage.
     *
     * @param CreateModele_organoleptiquesRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_organoleptiquesRequest $request)
    {
        $input = $request->all();

        $modeleOrganoleptiques = $this->modeleOrganoleptiquesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modeleOrganoleptiques.singular')]));

        return redirect(route('modeleOrganoleptiques.index'));
    }

    /**
     * Display the specified Modele_organoleptiques.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleOrganoleptiques = $this->modeleOrganoleptiquesRepository->find($id);

        if (empty($modeleOrganoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleOrganoleptiques.singular')]));

            return redirect(route('modeleOrganoleptiques.index'));
        }

        return view('modele_organoleptiques.show')->with('modeleOrganoleptiques', $modeleOrganoleptiques);
    }

    /**
     * Show the form for editing the specified Modele_organoleptiques.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleOrganoleptiques = $this->modeleOrganoleptiquesRepository->find($id);

        if (empty($modeleOrganoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleOrganoleptiques.singular')]));

            return redirect(route('modeleOrganoleptiques.index'));
        }

        return view('modele_organoleptiques.edit')->with('modeleOrganoleptiques', $modeleOrganoleptiques);
    }

    /**
     * Update the specified Modele_organoleptiques in storage.
     *
     * @param int $id
     * @param UpdateModele_organoleptiquesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_organoleptiquesRequest $request)
    {
        $modeleOrganoleptiques = $this->modeleOrganoleptiquesRepository->find($id);

        if (empty($modeleOrganoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleOrganoleptiques.singular')]));

            return redirect(route('modeleOrganoleptiques.index'));
        }

        $modeleOrganoleptiques = $this->modeleOrganoleptiquesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleOrganoleptiques.singular')]));

        return redirect(route('modeleOrganoleptiques.index'));
    }

    /**
     * Remove the specified Modele_organoleptiques from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleOrganoleptiques = $this->modeleOrganoleptiquesRepository->find($id);

        if (empty($modeleOrganoleptiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleOrganoleptiques.singular')]));

            return redirect(route('modeleOrganoleptiques.index'));
        }

        $this->modeleOrganoleptiquesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleOrganoleptiques.singular')]));

        return redirect(route('modeleOrganoleptiques.index'));
    }
}
