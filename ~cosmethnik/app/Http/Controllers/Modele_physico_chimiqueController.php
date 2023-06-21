<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_physico_chimiqueDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_physico_chimiqueRequest;
use App\Http\Requests\UpdateModele_physico_chimiqueRequest;
use App\Repositories\Modele_physico_chimiqueRepository;
use Flash;
use Illuminate\Http\Request;
use App\Models\Sites;
use App\Models\Modele_physico_chimique;
use App\Models\Physico_chimiques;
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
     * fonction d'enregistrement d'un modele physico-chimique
     *
     * @param CreateModele_physico_chimiqueRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_physico_chimiqueRequest $request)
    {
        $input = $request->all();

        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modelephysicochimique = new Modele_physico_chimique;
        $modelephysicochimique->caracteristique = $request->caracteristique;
        $modelephysicochimique->valeur = $request->valeur;
        $modelephysicochimique->mini = $request->mini;
        $modelephysicochimique->maxi = $request->maxi;
        $modelephysicochimique->critere_texte = $request->critere_texte;
        $modelephysicochimique->physico_chimique_id = $request->physico_chimique_id;
        $model->mmodele_physico_chimiques()->save($modelephysicochimique);
        Flash::success(__('messages.saved', ['model' => __('models/modelePhysicoChimiques.singular')]));

        return back();
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
     * Redirection vers la liste de modele physico-chimique
     *
     * @return Response
     */
    public function model(Request $request,Modele_physico_chimiqueDataTable $modelePhysicoChimiqueDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        $physicochimique = Physico_chimiques::all()->pluck('nom', 'id');
        return $modelePhysicoChimiqueDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_physico_chimiques.model', compact('menu','physicochimique','site_texte','icon','dossier_parent','model','data','object'));
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
