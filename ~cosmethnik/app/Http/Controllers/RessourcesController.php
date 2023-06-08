<?php

namespace App\Http\Controllers;

use App\DataTables\RessourcesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRessourcesRequest;
use App\Http\Requests\UpdateRessourcesRequest;
use App\Repositories\RessourcesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Dossiers;
use App\Models\Modele_familles;
use App\Models\Ressources;
use Illuminate\Support\Facades\DB;
use Response;

class RessourcesController extends AppBaseController
{
    /** @var  RessourcesRepository */
    private $ressourcesRepository;

    public function __construct(RessourcesRepository $ressourcesRepo)
    {
        $this->ressourcesRepository = $ressourcesRepo;
    }

    /**
     * Display a listing of the Ressources.
     *
     * @param RessourcesDataTable $ressourcesDataTable
     * @return Response
     */
    public function index(RessourcesDataTable $ressourcesDataTable)
    {
        return $ressourcesDataTable->render('ressources.index');
    }

    /**
     * Show the form for creating a new Ressources.
     *
     * @return Response
     */
    public function create()
    {
        return view('ressources.create');
    }

    /**
     * Store a newly created Ressources in storage.
     *
     * @param CreateRessourcesRequest $request
     *
     * @return Response
     */
    public function store(CreateRessourcesRequest $request)
    {
        $input = $request->all();
        $modele_famille = new Modele_familles;
        $modele_famille->famille_id = $input['famille'];

        //Déterminer s'il y a déjà un dossier nommer Produits fini
        $dossier = Dossiers::where('sites_id','=',$input['sites_id'])
            ->where('name','LIKE','%'.'ressources'.'%')
            ->orWhere('name', 'LIKE', '%'.'ressource'.'%')
            ->get();
        //Si le dossie existe
        if($dossier->isEmpty() != true){
            //Créer un nouveau produit fini
            $ressource = Ressources::firstOrCreate(
                [ 'nom' => $input['nom'] ],
                [
                    'titre' => $input['titre'], 'libelle_legale' => $input['libelle_legale'], 'description' => $input['description'],'code_bcpg' => $input['code_bcepg'],'code_erp' => $input['code_erp'],'ean' => $input['ean'],'etat_produit_id' => $input['etat_produit'],'modele' => $input['modele'],'unite_id' => $input['unite'],'commentaires' => $input['commentaires'],'dossier_id' => $dossier[0]['id']
                 ]
            );

            //Créer le relation avec famille
            if($ressource){
                $ressources_model = Ressources::find($ressource->id);
                DB::table('modele_familles')->insert(
                    ['model_type' => get_class($ressources_model) ,
                     'model_id' => $ressources_model->id,
                     'famille_id' => $input['famille']
                    ]
                );
            }
        //Si le dossier n'existe pas alors il crée d'abord le dossier avant de créer le produit fini
        }else{
            $doc = Dossiers::firstOrCreate(
                ['name' => 'Ressources'],
                [
                    'sites_id' => $input['sites_id'],
                    'title' =>'Ressources',
                    'parent_id' => 1,
                    'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/ressource'
                ]
            );

            //Si le dossier est créer
            if($doc){
                //Créer un nouveau produit fini
                $ressource = Ressources::firstOrCreate(
                    [ 'nom' => $input['nom'] ],
                    [
                        'titre' => $input['titre'], 'libelle_legale' => $input['libelle_legale'], 'description' => $input['description'],'code_bcpg' => $input['code_bcepg'],'code_erp' => $input['code_erp'],'ean' => $input['ean'],'etat_produit_id' => $input['etat_produit'],'modele' => $input['modele'],'unite_id' => $input['unite'],'commentaires' => $input['commentaires'],'dossier_id' => $doc['id']
                    ]
                );
                if($ressource){
                    $ressources_modele = Ressources::find($ressource->id);
                    DB::table('modele_familles')->insert([
                        'model_type' => get_class($ressources_modele) ,
                        'model_id' => $ressources_modele->id,
                        'famille_id' => $input['famille']
                        ]
                    );
                }
            }
        }

        // return json_encode(array("status"=>200, "dossier_id"=> $doc['id']));
    }

    /**
     * Display the specified Ressources.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        return view('ressources.show')->with('ressources', $ressources);
    }

    /**
     * Show the form for editing the specified Ressources.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        return view('ressources.edit')->with('ressources', $ressources);
    }

    /**
     * Update the specified Ressources in storage.
     *
     * @param  int              $id
     * @param UpdateRessourcesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRessourcesRequest $request)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        $ressources = $this->ressourcesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ressources.singular')]));

        return redirect(route('ressources.index'));
    }

    /**
     * Remove the specified Ressources from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ressources = $this->ressourcesRepository->find($id);

        if (empty($ressources)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ressources.singular')]));

            return redirect(route('ressources.index'));
        }

        $this->ressourcesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ressources.singular')]));

        return redirect(route('ressources.index'));
    }
}
