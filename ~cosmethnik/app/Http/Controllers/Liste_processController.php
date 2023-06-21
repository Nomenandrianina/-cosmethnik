<?php

namespace App\Http\Controllers;

use App\DataTables\Liste_processDataTable;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateListe_processRequest;
use App\Http\Requests\UpdateListe_processRequest;
use App\Repositories\Liste_processRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Liste_process;
use App\Models\Ressources;
use App\Models\Sites;
use App\Models\Unites;
use Response;

class Liste_processController extends AppBaseController
{
    /** @var  Liste_processRepository */
    private $listeProcessRepository;

    public function __construct(Liste_processRepository $listeProcessRepo)
    {
        $this->listeProcessRepository = $listeProcessRepo;
    }

    /**
     * Display a listing of the Liste_process.
     *
     * @param Liste_processDataTable $listeProcessDataTable
     * @return Response
     */
    public function index(Liste_processDataTable $listeProcessDataTable)
    {
        return $listeProcessDataTable->render('liste_processes.index');
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,Liste_processDataTable $listeDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $ressource = Ressources::all();
        $unite = Unites::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $listeDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('liste_processes.model', compact('menu','site_texte','icon','dossier_parent','model','data','ressource','unite','object'));
    }

    /**
     * Show the form for creating a new Liste_process.
     *
     * @return Response
     */
    public function create()
    {
        return view('liste_processes.create');
    }

    /**
     * Store a newly created Liste_process in storage.
     *
     * @param CreateListe_processRequest $request
     *
     * @return Response
     */
    public function store(CreateListe_processRequest $request)
    {
        $input = $request->all();
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $listeP = new Liste_process;
        $listeP->etape = $input['etape'];
        $listeP->ressource_id = $input['ressource_id'];
        $listeP->quantite = $input['quantite'];
        $listeP->cadence = $input['cadence'];
        $listeP->unite_cadence = $input['unite_cadence'];
        $listeP->produit_heure = $input['produit_heure'];
        $listeP->taux_horaire = floatval($input['taux_horaire']);

        $model->liste_process()->save($listeP);

        Flash::success(__('messages.save', ['model' => __('models/listeProcesses.singular')]));
        return back();
    }

    /**
     * Display the specified Liste_process.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        return view('liste_processes.show')->with('listeProcess', $listeProcess);
    }

    /**
     * Show the form for editing the specified Liste_process.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        return view('liste_processes.edit')->with('listeProcess', $listeProcess);
    }

    /**
     * Update the specified Liste_process in storage.
     *
     * @param  int              $id
     * @param UpdateListe_processRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateListe_processRequest $request)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        $listeProcess = $this->listeProcessRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/listeProcesses.singular')]));

        return redirect(route('listeProcesses.index'));
    }

    /**
     * Remove the specified Liste_process from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $listeProcess = $this->listeProcessRepository->find($id);

        if (empty($listeProcess)) {
            Flash::error(__('messages.not_found', ['model' => __('models/listeProcesses.singular')]));

            return redirect(route('listeProcesses.index'));
        }

        $this->listeProcessRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/listeProcesses.singular')]));

        return redirect(route('listeProcesses.index'));
    }
}
