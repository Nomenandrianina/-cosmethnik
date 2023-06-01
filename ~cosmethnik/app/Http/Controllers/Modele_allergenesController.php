<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_allergenesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_allergenesRequest;
use App\Http\Requests\UpdateModele_allergenesRequest;
use App\Repositories\Modele_allergenesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Allergenes;
use App\Models\Matiere_premiere;
use App\Models\Modele_allergenes;
use App\Models\Ressources;
use Illuminate\Http\Request;
use App\Models\Sites;
use App\Models\Unites;
use Response;

class Modele_allergenesController extends AppBaseController
{
    /** @var  Modele_allergenesRepository */
    private $modeleAllergenesRepository;

    public function __construct(Modele_allergenesRepository $modeleAllergenesRepo)
    {
        $this->modeleAllergenesRepository = $modeleAllergenesRepo;
    }

    /**
     * Display a listing of the Modele_allergenes.
     *
     * @param Modele_allergenesDataTable $modeleAllergenesDataTable
     * @return Response
     */
    public function index(Modele_allergenesDataTable $modeleAllergenesDataTable)
    {
        return $modeleAllergenesDataTable->render('modele_allergenes.index');
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,Modele_allergenesDataTable $modeleAllergenesDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $allergenes = Allergenes::all();
        $mp = Matiere_premiere::all();
        $ressource = Ressources::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $modeleAllergenesDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_allergenes.model', compact('menu','site_texte','icon','dossier_parent','model','data','allergenes','mp','object','ressource'));
    }

    /**
     * Show the form for creating a new Modele_allergenes.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_allergenes.create');
    }

    /**
     * Store a newly created Modele_allergenes in storage.
     *
     * @param CreateModele_allergenesRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_allergenesRequest $request)
    {
        $input = $request->all();
        $input['pres_volontaire'] = $request->has('pres_volontaire');
        $input['pres_fortuite'] = $request->has('pres_fortuite');

        $id_model = intval($request->id_model);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modeleAllergenes = new Modele_allergenes;
        $modeleAllergenes->allergene_id = $input['allergenes'];
        $modeleAllergenes->quantite = $input['quantite'];
        $modeleAllergenes->pres_volontaire = $input['pres_volontaire'];
        $modeleAllergenes->pres_fortuite = $input['pres_fortuite'];
        $modeleAllergenes->arbre_decision = $input['arbre_decision'];
        if($request->has('source_volontaire') && $request->has('source_fortuite')){
            $modeleAllergenes->source_pres_volontaire = $input['source_volontaire'];
            $modeleAllergenes->source_pres_fortuite = $input['source_fortuite'];
        }


        $model->mmodele_allergenes()->save($modeleAllergenes);


        Flash::success(__('messages.saved', ['model' => __('models/modeleAllergenes.singular')]));
        return back();
    }

    /**
     * Display the specified Modele_allergenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        return view('modele_allergenes.show')->with('modeleAllergenes', $modeleAllergenes);
    }

    /**
     * Show the form for editing the specified Modele_allergenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        return view('modele_allergenes.edit')->with('modeleAllergenes', $modeleAllergenes);
    }

    /**
     * Update the specified Modele_allergenes in storage.
     *
     * @param  int              $id
     * @param UpdateModele_allergenesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_allergenesRequest $request)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        $modeleAllergenes = $this->modeleAllergenesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleAllergenes.singular')]));

        return redirect(route('modeleAllergenes.index'));
    }

    /**
     * Remove the specified Modele_allergenes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleAllergenes = $this->modeleAllergenesRepository->find($id);

        if (empty($modeleAllergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllergenes.singular')]));

            return redirect(route('modeleAllergenes.index'));
        }

        $this->modeleAllergenesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleAllergenes.singular')]));

        return redirect(route('modeleAllergenes.index'));
    }
}
