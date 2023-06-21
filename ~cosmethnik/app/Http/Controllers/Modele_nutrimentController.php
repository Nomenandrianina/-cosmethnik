<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_nutrimentDataTable;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateModele_nutrimentRequest;
use App\Http\Requests\UpdateModele_nutrimentRequest;
use App\Repositories\Modele_nutrimentRepository;
use App\Models\Sites;
use App\Models\Unites;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Modele_nutriment;
use App\Models\Nutriments;
use Response;

class Modele_nutrimentController extends AppBaseController
{
    /** @var  Modele_nutrimentRepository */
    private $modeleNutrimentRepository;

    public function __construct(Modele_nutrimentRepository $modeleNutrimentRepo)
    {
        $this->modeleNutrimentRepository = $modeleNutrimentRepo;
    }

    /**
     * Display a listing of the Modele_nutriment.
     *
     * @param Modele_nutrimentDataTable $modeleNutrimentDataTable
     * @return Response
     */
    public function index(Modele_nutrimentDataTable $modeleNutrimentDataTable)
    {
        return $modeleNutrimentDataTable->render('modele_nutriments.index');
    }

    /**
     * Show the form for creating a new Modele_nutriment.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_nutriments.create');
    }


    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,Modele_nutrimentDataTable $modeleNutrimentsDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $nutriments = Nutriments::all();
        $unite = Unites::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $modeleNutrimentsDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_nutriments.model', compact('menu','site_texte','icon','dossier_parent','model','data','nutriments','unite','object'));
    }

    /**
     * Store a newly created Modele_nutriment in storage.
     *
     * @param CreateModele_nutrimentRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_nutrimentRequest $request)
    {
        $input = $request->all();
        $input = $request->all();
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);
        $modelenutriments = new Modele_nutriment;

        if($input['nutriment_id'] == 1){
            $modelenutriments->unite = "kj/100g";
            $modelenutriments->unite_portion = "kj";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/8400;
        }
        if($input['nutriment_id'] == 2){
            $modelenutriments->unite = "kcal/100g";
            $modelenutriments->unite_portion = "kcal";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/2000;
        }
        if($input['nutriment_id'] == 3){
            $modelenutriments->unite = "g/100g";
            $modelenutriments->unite_portion = "g";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/70;
        }
        if($input['nutriment_id'] == 4){
            $modelenutriments->unite = "g/100g";
            $modelenutriments->unite_portion = "g";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/260;
        }
        if($input['nutriment_id'] == 5){
            $modelenutriments->unite = "g/100g";
            $modelenutriments->unite_portion = "g";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/50;
        }
        if($input['nutriment_id'] == 6){
            $modelenutriments->unite = "g/100g";
            $modelenutriments->unite_portion = "g";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/25;
        }
        if($input['nutriment_id'] == 7){
            $modelenutriments->unite = "mg/100g";
            $modelenutriments->unite_portion = "mg";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/2400;
        }
        if($input['nutriment_id'] == 8){
            $modelenutriments->unite = "g/100g";
            $modelenutriments->unite_portion = "g";
            $modelenutriments->ajr_portion = ($input['valeur']*100)/6;
        }


        $modelenutriments->nutriment_id = $input['nutriment_id'];
        $modelenutriments->valeur = $input['valeur'];
        $modelenutriments->mini = $input['mini'];
        $modelenutriments->maxi = $input['maxi'];
        $modelenutriments->portion = $input['portion'];
        $modelenutriments->perte = $input['perte'];
        $modelenutriments->methode = $input['methode'];
        $model->mmodele_nutriments()->save($modelenutriments);

        Flash::success(__('messages.saved', ['model' => __('models/modeleNutriments.singular')]));
        return back();
    }

    /**
     * Display the specified Modele_nutriment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleNutriment = $this->modeleNutrimentRepository->find($id);

        if (empty($modeleNutriment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleNutriments.singular')]));

            return redirect(route('modeleNutriments.index'));
        }

        return view('modele_nutriments.show')->with('modeleNutriment', $modeleNutriment);
    }

    /**
     * Show the form for editing the specified Modele_nutriment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleNutriment = $this->modeleNutrimentRepository->find($id);

        if (empty($modeleNutriment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleNutriments.singular')]));

            return redirect(route('modeleNutriments.index'));
        }

        return view('modele_nutriments.edit')->with('modeleNutriment', $modeleNutriment);
    }

    /**
     * Update the specified Modele_nutriment in storage.
     *
     * @param  int              $id
     * @param UpdateModele_nutrimentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_nutrimentRequest $request)
    {
        $modeleNutriment = $this->modeleNutrimentRepository->find($id);

        if (empty($modeleNutriment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleNutriments.singular')]));

            return redirect(route('modeleNutriments.index'));
        }

        $modeleNutriment = $this->modeleNutrimentRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleNutriments.singular')]));

        return redirect(route('modeleNutriments.index'));
    }

    /**
     * Remove the specified Modele_nutriment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleNutriment = $this->modeleNutrimentRepository->find($id);

        if (empty($modeleNutriment)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleNutriments.singular')]));

            return redirect(route('modeleNutriments.index'));
        }

        $this->modeleNutrimentRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleNutriments.singular')]));

        return redirect(route('modeleNutriments.index'));
    }
}
