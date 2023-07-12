<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_materiauxDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_materiauxRequest;
use App\Http\Requests\UpdateModele_materiauxRequest;
use App\Repositories\Modele_materiauxRepository;
use Flash;
use App\Models\Modele_materiaux;
use App\Models\Sites;
use App\Models\Unites;
use App\Models\Emballages;
use App\Models\Materiaux;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_materiauxController extends AppBaseController
{
    /** @var  Modele_materiauxRepository */
    private $modeleMateriauxRepository;

    public function __construct(Modele_materiauxRepository $modeleMateriauxRepo)
    {
        $this->modeleMateriauxRepository = $modeleMateriauxRepo;
    }

    /**
     * Display a listing of the Modele_materiaux.
     *
     * @param Modele_materiauxDataTable $modeleMateriauxDataTable
     * @return Response
     */
    public function index(Modele_materiauxDataTable $modeleMateriauxDataTable)
    {
        return $modeleMateriauxDataTable->render('modele_materiauxes.index');
    }

    /**
     * Show the form for creating a new Modele_materiaux.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_materiauxes.create');
    }

    /**
     * Store a newly created Modele_materiaux in storage.
     *
     * @param CreateModele_materiauxRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_materiauxRequest $request)
    {
        $input = $request->all();

        $modeleMateriaux = $this->modeleMateriauxRepository->create($input);
        $input = $request->all();
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modelemateriaux = new Modele_materiaux;
        $modelemateriaux->quantite = $input['quantite'];
        $modelemateriaux->ingredient_id = $request->ingredient;
        $model->mmodele_ingredients()->save($modelemateriaux);

        Flash::success(__('messages.saved', ['model' => __('models/modeleMateriauxes.singular')]));

        return back();
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,Modele_materiauxRepository $materiauxDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $emballages = Emballages::all();
        $unite = Unites::all();
        $materiaux = Materiaux::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $materiauxDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_materiaux.model', compact('menu','materiaux','site_texte','icon','dossier_parent','model','data','emballages','unite','object'));
    }


    /**
     * Display the specified Modele_materiaux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        return view('modele_materiauxes.show')->with('modeleMateriaux', $modeleMateriaux);
    }

    /**
     * Show the form for editing the specified Modele_materiaux.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        return view('modele_materiauxes.edit')->with('modeleMateriaux', $modeleMateriaux);
    }

    /**
     * Update the specified Modele_materiaux in storage.
     *
     * @param  int              $id
     * @param UpdateModele_materiauxRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_materiauxRequest $request)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        $modeleMateriaux = $this->modeleMateriauxRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleMateriauxes.singular')]));

        return redirect(route('modeleMateriauxes.index'));
    }

    /**
     * Remove the specified Modele_materiaux from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleMateriaux = $this->modeleMateriauxRepository->find($id);

        if (empty($modeleMateriaux)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleMateriauxes.singular')]));

            return redirect(route('modeleMateriauxes.index'));
        }

        $this->modeleMateriauxRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleMateriauxes.singular')]));

        return redirect(route('modeleMateriauxes.index'));
    }
}
