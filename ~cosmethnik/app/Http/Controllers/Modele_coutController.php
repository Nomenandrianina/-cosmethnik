<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_coutDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_coutRequest;
use App\Http\Requests\UpdateModele_coutRequest;
use App\Repositories\Modele_coutRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Sites;
use App\Models\Couts;
use App\Models\Unites;
use App\Models\Modele_cout;
use Response;

class Modele_coutController extends AppBaseController
{
    /** @var  Modele_coutRepository */
    private $modeleCoutRepository;

    public function __construct(Modele_coutRepository $modeleCoutRepo)
    {
        $this->modeleCoutRepository = $modeleCoutRepo;
    }

    /**
     * Display a listing of the Modele_cout.
     *
     * @param Modele_coutDataTable $modeleCoutDataTable
     * @return Response
     */
    public function index(Modele_coutDataTable $modeleCoutDataTable)
    {
        return $modeleCoutDataTable->render('modele_couts.index');
    }

    /**
     * Show the form for creating a new Modele_cout.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_couts.create');
    }


     /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,Modele_coutDataTable $modeleAllergenesDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $couts = Couts::all();
        $unite = Unites::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $modeleAllergenesDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_couts.model', compact('menu','site_texte','icon','dossier_parent','model','unite','data','couts','object'));
    }


    /**
     * Store a newly created Modele_cout in storage.
     *
     * @param CreateModele_coutRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_coutRequest $request)
    {
        $input = $request->all();

        $input = $request->all();
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modelecouts = new Modele_cout;
        $modelecouts->cout_id = $request->cout_id;
        $modelecouts->valeur = $request->valeur;
        $modelecouts->unite = $request->unite;
        $modelecouts->valeur1 = $request->valeur1;
        $modelecouts->valeur2 = $request->valeur2;
        $modelecouts->euv = $request->euv;
        $modelecouts->manuel = $request->has('manuel');
        $model->mmodele_ingredients()->save($modelecouts);

        Flash::success(__('messages.saved', ['model' => __('models/modeleCouts.singular')]));

        return back();
    }

    /**
     * Display the specified Modele_cout.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleCout = $this->modeleCoutRepository->find($id);

        if (empty($modeleCout)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleCouts.singular')]));

            return redirect(route('modeleCouts.index'));
        }

        return view('modele_couts.show')->with('modeleCout', $modeleCout);
    }

    /**
     * Show the form for editing the specified Modele_cout.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleCout = $this->modeleCoutRepository->find($id);

        if (empty($modeleCout)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleCouts.singular')]));

            return redirect(route('modeleCouts.index'));
        }

        return view('modele_couts.edit')->with('modeleCout', $modeleCout);
    }

    /**
     * Update the specified Modele_cout in storage.
     *
     * @param  int              $id
     * @param UpdateModele_coutRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_coutRequest $request)
    {
        $modeleCout = $this->modeleCoutRepository->find($id);

        if (empty($modeleCout)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleCouts.singular')]));

            return redirect(route('modeleCouts.index'));
        }

        $modeleCout = $this->modeleCoutRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleCouts.singular')]));

        return redirect(route('modeleCouts.index'));
    }

    /**
     * Remove the specified Modele_cout from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleCout = $this->modeleCoutRepository->find($id);

        if (empty($modeleCout)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleCouts.singular')]));

            return redirect(route('modeleCouts.index'));
        }

        $this->modeleCoutRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleCouts.singular')]));

        return redirect(route('modeleCouts.index'));
    }
}
