<?php

namespace App\Http\Controllers;

use App\DataTables\EmballagesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmballagesRequest;
use App\Http\Requests\UpdateEmballagesRequest;
use App\Repositories\EmballagesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Emballages;
use App\Models\Dossiers;
use Response;

class EmballagesController extends AppBaseController
{
    /** @var  EmballagesRepository */
    private $emballagesRepository;

    public function __construct(EmballagesRepository $emballagesRepo)
    {
        $this->emballagesRepository = $emballagesRepo;
    }

    /**
     * Display a listing of the Emballages.
     *
     * @param EmballagesDataTable $emballagesDataTable
     * @return Response
     */
    public function index(EmballagesDataTable $emballagesDataTable)
    {
        return $emballagesDataTable->render('emballages.index');
    }

    /**
     * Show the form for creating a new Emballages.
     *
     * @return Response
     */
    public function create()
    {
        return view('emballages.create');
    }

    /**
     * Store a newly created Emballages in storage.
     *
     * @param CreateEmballagesRequest $request
     *
     * @return Response
     */
    public function store(CreateEmballagesRequest $request)
    {
        $input = $request->all();

         //Déterminer s'il y a déjà un dossier nommer Emballage(s)
         $dossier = Dossiers::where('sites_id','=',$input['sites_id'])
         ->where('name','LIKE','%'.'emballage'.'%')
         ->orWhere('name', 'LIKE', '%'.'emballages'.'%')
         ->get();
        //Si le dossie existe
        if($dossier->isEmpty() != true){
            //Créer un nouveau emballage
            Emballages::firstOrCreate(
                [ 'nom' => $input['nom'] ],
                [
                    'titre' => $input['titre'], 'description' => $input['description'],'dossier_id' => $dossier[0]['id']
                ]

            );

            return json_encode(array("status"=>200, "dossier_id"=> $dossier[0]['id']));

        //Si le dossier n'existe pas alors il crée d'abord le dossier avant de créer le produit fini
        }else{
            // dd($input['sites_id']);
            $doc = Dossiers::firstOrCreate(
                ['name' => 'Emballages'],
                [
                    'sites_id' => $input['sites_id'],
                    'title' =>'Emballages',
                    'parent_id' => 1,
                    'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/emballages'
                ]
            );
            //Si le dossier est créer
            if($doc){
                //Créer un nouveau produit fini
                Emballages::firstOrCreate(
                    [ 'nom' => $input['nom'] ],
                    [
                        'titre' => $input['titre'], 'description' => $input['description'],'dossier_id' => $doc['id']
                    ]
                );
            }
            return json_encode(array("status"=>200, "dossier_id"=> $doc['id']));
        }

    }

    /**
     * Display the specified Emballages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        return view('emballages.show')->with('emballages', $emballages);
    }

    /**
     * Show the form for editing the specified Emballages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        return view('emballages.edit')->with('emballages', $emballages);
    }

    /**
     * Update the specified Emballages in storage.
     *
     * @param  int              $id
     * @param UpdateEmballagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmballagesRequest $request)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        $emballages = $this->emballagesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/emballages.singular')]));

        return redirect(route('emballages.index'));
    }

    /**
     * Remove the specified Emballages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        $this->emballagesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/emballages.singular')]));

        return redirect(route('emballages.index'));
    }
}
