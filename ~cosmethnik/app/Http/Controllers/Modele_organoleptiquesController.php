<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateModele_organoleptiquesRequest;
use App\Http\Requests\UpdateModele_organoleptiquesRequest;
use App\Repositories\Modele_organoleptiquesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Organoleptiques;
use App\Models\Sites;
use App\Models\Modele_organoleptiques;
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

        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modeleorganoleptique = new Modele_organoleptiques;
        $modeleorganoleptique->caracteristique = $request->caracteristique;
        $modeleorganoleptique->valeur = $request->valeur;
        $modeleorganoleptique->organoletptique_id = $request->organoletptique_id;
        $model->mmodele_physico_chimiques()->save($modeleorganoleptique);

        Flash::success(__('messages.saved', ['model' => __('models/modeleOrganoleptiques.singular')]));

        return back();
    }

     /**
     * Redirection vers la liste de la modele organoleptique
     *
     * @return Response
     */
    public function model(Request $request,Modele_organoleptiquesRepository $modeleOrganoleptiqueDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit'])->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        $organoleptique = Organoleptiques::all()->pluck('nom', 'id');
        return $modeleOrganoleptiqueDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_organoleptiques.model', compact('menu','organoleptique','site_texte','icon','dossier_parent','model','data','object'));
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
