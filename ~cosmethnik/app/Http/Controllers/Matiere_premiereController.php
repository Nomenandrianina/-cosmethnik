<?php

namespace App\Http\Controllers;

use App\DataTables\Matiere_premiereDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMatiere_premiereRequest;
use App\Http\Requests\UpdateMatiere_premiereRequest;
use App\Repositories\Matiere_premiereRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Etat_produits;
use App\Models\Matiere_premiere;
use App\Models\Dossiers;
use App\Models\Usines;
use App\Models\Geographiques;
use App\Models\Marques;
use Response;

class Matiere_premiereController extends AppBaseController
{
    /** @var  Matiere_premiereRepository */
    private $matierePremiereRepository;

    public function __construct(Matiere_premiereRepository $matierePremiereRepo)
    {
        $this->matierePremiereRepository = $matierePremiereRepo;
    }

    /**
     * Display a listing of the Matiere_premiere.
     *
     * @param Matiere_premiereDataTable $matierePremiereDataTable
     * @return Response
     */
    public function index(Matiere_premiereDataTable $matierePremiereDataTable)
    {
        return $matierePremiereDataTable->render('matiere_premieres.index');
    }

    /**
     * Show the form for creating a new Matiere_premiere.
     *
     * @return Response
     */
    public function create()
    {
        $etat_prod = Etat_produits::pluck('designation','id');
        $usine = Usines::pluck('description','id');
        $origines_geo = Geographiques::pluck('description','id');
        $marque = Marques::pluck('description','id');

        $view = array(
            'etat_prod' => $etat_prod,
            'usines' => $usine,
            'origines_geo' => $origines_geo,
            'marque' => $marque
        );
        return view('matiere_premieres.create',$view);
    }

    /**
     * Store a newly created Matiere_premiere in storage.
     *
     * @param CreateMatiere_premiereRequest $request
     *
     * @return Response
     */
    public function store(CreateMatiere_premiereRequest $request)
    {
        $input = $request->all();

        //Déterminer s'il y a déjà un dossier nommer Matière première
        $dossier = Dossiers::where('sites_id','=',$input['sites_id'])
            ->where('name','LIKE','%'.'matières premières'.'%')
            ->orWhere('name', 'LIKE', '%'.'matières première'.'%')
            ->orWhere('name', 'LIKE', '%'.'matière premières'.'%')
            ->orWhere('name', 'LIKE', '%'.'matière première'.'%')
            ->get();
        //Si le dossie existe
        if($dossier->isEmpty() != true){
            //Créer un nouveau produit fini
            Matiere_premiere::firstOrCreate(
                [ 'nom' => $input['nom'] ],
                [
                    'libelle_commerciale' => $input['libelle_commerciale'], 'libelle_legale' => $input['libelle_legale'], 'description' => $input['description'],'code_becpg' => $input['code_becpg'],'code_erp' => $input['code_erp'],'ean' => $input['ean'],'ean_colis' => $input['ean_colis'],'ean_palette' => $input['ean_palette'],'etat_produit_id' => $input['etat_produit_id'],'usine_id' => $input['usine_id'],'geographique_id' => $input['geographique_id'],'marque_id' => $input['marque'],'dossier_id' => $dossier[0]['id']
                 ]

            );

            return json_encode(array("status"=>200, "dossier_id"=> $dossier[0]['id']));

        //Si le dossier n'existe pas alors il crée d'abord le dossier avant de créer le produit fini
        }else{
            $doc = Dossiers::firstOrCreate(
                ['name' => 'Matières premières'],
                [
                    'sites_id' => $input['sites_id'],
                    'title' =>'Matières premières',
                    'parent_id' => 1,
                    'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/matierepremiere'
                ]
            );
            //Si le dossier est créer
            if($doc){
                //Créer un nouveau produit fini
                Matiere_premiere::firstOrCreate(
                    [ 'nom' => $input['nom'] ],
                    [
                        'libelle_commerciale' => $input['libelle_commerciale'], 'libelle_legale' => $input['libelle_legale'], 'description' => $input['description'],'code_becpg' => $input['code_becpg'],'code_erp' => $input['code_erp'],'ean' => $input['ean'],'ean_colis' => $input['ean_colis'],'ean_palette' => $input['ean_palette'],'etat_produit_id' => $input['etat_produit_id'],'usine_id' => $input['usine_id'],'geographique_id' => $input['geographique_id'],'marque_id' => $input['marque'],'dossier_id' => $doc['id']
                    ]
                );
            }
            return json_encode(array("status"=>200, "dossier_id"=> $doc['id']));
        }
    }

    /**
     * Display the specified Matiere_premiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        return view('matiere_premieres.show')->with('matierePremiere', $matierePremiere);
    }

    /**
     * Show the form for editing the specified Matiere_premiere.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        return view('matiere_premieres.edit')->with('matierePremiere', $matierePremiere);
    }

    /**
     * Update the specified Matiere_premiere in storage.
     *
     * @param  int              $id
     * @param UpdateMatiere_premiereRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMatiere_premiereRequest $request)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        $matierePremiere = $this->matierePremiereRepository->update($request->all(), $id);

        return json_encode(array("status"=>200));
    }

    /**
     * Remove the specified Matiere_premiere from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $matierePremiere = $this->matierePremiereRepository->find($id);

        if (empty($matierePremiere)) {
            Flash::error(__('messages.not_found', ['model' => __('models/matierePremieres.singular')]));

            return redirect(route('matierePremieres.index'));
        }

        $this->matierePremiereRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/matierePremieres.singular')]));

        return redirect(route('matierePremieres.index'));
    }
}
