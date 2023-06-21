<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_allegationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_allegationsRequest;
use App\Http\Requests\UpdateModele_allegationsRequest;
use App\Repositories\Modele_allegationsRepository;
use Flash;
use Illuminate\Http\Request;
use App\Models\Allegations;
use App\Models\Sites;
use App\Models\Modele_allegations;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_allegationsController extends AppBaseController
{
    /** @var  Modele_allegationsRepository */
    private $modeleAllegationsRepository;

    public function __construct(Modele_allegationsRepository $modeleAllegationsRepo)
    {
        $this->modeleAllegationsRepository = $modeleAllegationsRepo;
    }

    /**
     * Display a listing of the Modele_allegations.
     *
     * @param Modele_allegationsDataTable $modeleAllegationsDataTable
     * @return Response
     */
    public function index(Modele_allegationsDataTable $modeleAllegationsDataTable)
    {
        return $modeleAllegationsDataTable->render('modele_allegations.index');
    }

    /**
     * Show the form for creating a new Modele_allegations.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_allegations.create');
    }

    /**
     * Store a newly created Modele_allegations in storage.
     *
     * @param CreateModele_allegationsRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_allegationsRequest $request)
    {
        $input = $request->all();

        $input = $request->all();
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modeleAllegation = new Modele_allegations;
        $modeleAllegation->revendique = $request->revendique;
        $modeleAllegation->information = $request->information;
        $modeleAllegation->date_certification = $request->date_certification;
        $modeleAllegation->allegation_id = $request->allegation_id;
        $model->mmodele_ingredients()->save($modeleAllegation);

        Flash::success(__('messages.saved', ['model' => __('models/modeleAllegations.singular')]));

        return back();
    }

    /**
     * Display the specified Modele_allegations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        return view('modele_allegations.show')->with('modeleAllegations', $modeleAllegations);
    }

    /**
     * Show the form for editing the specified Modele_allegations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        return view('modele_allegations.edit')->with('modeleAllegations', $modeleAllegations);
    }

     /**
     * Redirection vers la liste de modele d'allégation existant
     *
     * @return Response
     */
    public function model(Request $request,Modele_allegationsDataTable $modeleAllegation)
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
        $allegation = Allegations::all()->pluck('nom', 'id');
        return $modeleAllegation->with(['model_id' => $id_model,'model_type' => $object])->render('modele_allegations.model', compact('menu','allegation','site_texte','icon','dossier_parent','model','data','object'));
    }

    /**
     * Update the specified Modele_allegations in storage.
     *
     * @param  int              $id
     * @param UpdateModele_allegationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_allegationsRequest $request)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        $modeleAllegations = $this->modeleAllegationsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleAllegations.singular')]));

        return redirect(route('modeleAllegations.index'));
    }

    /**
     * Remove the specified Modele_allegations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleAllegations = $this->modeleAllegationsRepository->find($id);

        if (empty($modeleAllegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleAllegations.singular')]));

            return redirect(route('modeleAllegations.index'));
        }

        $this->modeleAllegationsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleAllegations.singular')]));

        return redirect(route('modeleAllegations.index'));
    }
}
