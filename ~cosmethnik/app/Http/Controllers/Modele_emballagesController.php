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
use Illuminate\Http\Request;
use App\Models\Matiere_premiere;
use Illuminate\Support\Facades\DB;
use App\Models\Sites;
use App\Models\Unites;
use App\Models\Emballages;
use App\Models\Modele_allergenes;
use App\Models\Modele_emballages;

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
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,Modele_emballagesDataTable $modeleEmballagesDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $emballages = Emballages::all();
        $unite = Unites::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $modeleEmballagesDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_emballages.model', compact('menu','site_texte','icon','dossier_parent','model','data','emballages','unite','object'));
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
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modeleEmballages = new Modele_emballages;
        $modeleEmballages->emballage_id = $input['emballage'];
        $modeleEmballages->unite = $input['unite'];
        $modeleEmballages->quantite = $input['quantite'];
        $modeleEmballages->variantes = $input['variantes'];
        $modeleEmballages->freinte = $input['freinte'];
        $modeleEmballages->maitre =  ($input['maitre'] = "true") ? 1 : 0;

        $model->mmodele_emballages()->save($modeleEmballages);


        Flash::success(__('messages.saved', ['model' => __('models/ModeleEmballages.singular')]));
        return back();
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
