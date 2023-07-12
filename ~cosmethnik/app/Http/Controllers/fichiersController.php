<?php

namespace App\Http\Controllers;

use App\DataTables\fichiersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatefichiersRequest;
use App\Http\Requests\UpdatefichiersRequest;
use App\Repositories\fichiersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Sites;
use App\Models\Unites;
use App\Models\Emballages;
use Illuminate\Http\Request;

class fichiersController extends AppBaseController
{
    /** @var  fichiersRepository */
    private $fichiersRepository;

    public function __construct(fichiersRepository $fichiersRepo)
    {
        $this->fichiersRepository = $fichiersRepo;
    }

    /**
     * Display a listing of the fichiers.
     *
     * @param fichiersDataTable $fichiersDataTable
     * @return Response
     */
    public function index(fichiersDataTable $fichiersDataTable)
    {
        return $fichiersDataTable->render('fichiers.index');
    }

    /**
     * Show the form for creating a new fichiers.
     *
     * @return Response
     */
    public function create()
    {
        return view('fichiers.create');
    }

    /**
     * Store a newly created fichiers in storage.
     *
     * @param CreatefichiersRequest $request
     *
     * @return Response
     */
    public function store(CreatefichiersRequest $request)
    {
        $input = $request->all();

        $fichiers = $this->fichiersRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/fichiers.singular')]));

        return redirect(route('fichiers.index'));
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,FichiersDataTable $fichiersDataTable)
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
        return $fichiersDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('fichiers.model', compact('menu','site_texte','icon','dossier_parent','model','data','emballages','unite','object'));
    }

    /**
     * Display the specified fichiers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        return view('fichiers.show')->with('fichiers', $fichiers);
    }

    /**
     * Show the form for editing the specified fichiers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        return view('fichiers.edit')->with('fichiers', $fichiers);
    }

    /**
     * Update the specified fichiers in storage.
     *
     * @param  int              $id
     * @param UpdatefichiersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefichiersRequest $request)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        $fichiers = $this->fichiersRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/fichiers.singular')]));

        return redirect(route('fichiers.index'));
    }

    /**
     * Remove the specified fichiers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fichiers = $this->fichiersRepository->find($id);

        if (empty($fichiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/fichiers.singular')]));

            return redirect(route('fichiers.index'));
        }

        $this->fichiersRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/fichiers.singular')]));

        return redirect(route('fichiers.index'));
    }
}
