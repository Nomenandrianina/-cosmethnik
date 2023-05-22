<?php

namespace App\Http\Controllers;

use App\DataTables\CompositionsDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompositionsRequest;
use App\Http\Requests\UpdateCompositionsRequest;
use App\Repositories\CompositionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Compositions;
use App\Models\Matiere_premiere;
use Illuminate\Support\Facades\DB;
use Response;
use App\Models\Sites;
use App\Models\Unites;

class CompositionsController extends AppBaseController
{
    /** @var  CompositionsRepository */
    private $compositionsRepository;

    public function __construct(CompositionsRepository $compositionsRepo)
    {
        $this->compositionsRepository = $compositionsRepo;
    }

    /**
     * Display a listing of the Compositions.
     *
     * @param CompositionsDataTable $compositionsDataTable
     * @return Response
     */
    public function index(CompositionsDataTable $compositionsDataTable)
    {
        return $compositionsDataTable->render('compositions.index');
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function create()
    {
        return view('compositions.create');
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,CompositionsDataTable $compositionsDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $matiere_premier = Matiere_premiere::all();
        $unite = Unites::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $compositionsDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('compositions.model', compact('menu','site_texte','icon','dossier_parent','model','data','matiere_premier','unite','object'));
    }

    /**
     * Store a newly created Compositions in storage.
     *
     * @param CreateCompositionsRequest $request
     *
     * @return Response
     */
    public function store(CreateCompositionsRequest $request)
    {
        $input = $request->all();
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $composition = new Compositions;
        $composition->matiere_premier_id = $input['produit'];
        $composition->unite = $input['unite'];
        $composition->quantite = $input['quantite'];
        $composition->poids = $input['poids'];
        $composition->rendement = $input['rdt'];
        $composition->freinte = $input['freinte'];

        $model->compositions()->save($composition);

        Flash::success(__('messages.save', ['model' => __('models/compositions.singular')]));
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
        return back();

    }

    /**
     * Display the specified Compositions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        return view('compositions.show')->with('compositions', $compositions);
    }

    /**
     * Show the form for editing the specified Compositions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        return view('compositions.edit')->with('compositions', $compositions);
    }

    /**
     * Update the specified Compositions in storage.
     *
     * @param  int              $id
     * @param UpdateCompositionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompositionsRequest $request)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        $compositions = $this->compositionsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/compositions.singular')]));

        return redirect(route('compositions.index'));
    }

    /**
     * Remove the specified Compositions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        $this->compositionsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/compositions.singular')]));

        return redirect(route('compositions.index'));
    }
}
