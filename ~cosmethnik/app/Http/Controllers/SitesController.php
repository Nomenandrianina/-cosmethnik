<?php

namespace App\Http\Controllers;

use App\DataTables\SitesDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSitesRequest;
use App\Http\Requests\UpdateSitesRequest;
use App\Repositories\SitesRepository;
use App\Models\Sites;
use App\Models\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SitesController extends AppBaseController
{
    /** @var  SitesRepository */
    private $sitesRepository;

    public function __construct(SitesRepository $sitesRepo)
    {
        $this->sitesRepository = $sitesRepo;
    }

    /**
     * Display a listing of the Sites.
     *
     * @param SitesDataTable $sitesDataTable
     * @return Response
     */
    public function index(SitesDataTable $sitesDataTable)
    {
        return $sitesDataTable->render('sites.index');
    }

    /**
     * Show the form for creating a new Sites.
     *
     * @return Response
     */
    public function create()
    {
        $user = User::all();
        $select = [];
        foreach($user as $item){
            $select[$item->id] = $item->name;
        }
        return view('sites.create')->with('users',$select);
    }

    /**
     * Store a newly created Sites in storage.
     *
     * @param CreateSitesRequest $request
     *
     * @return Response
     */
    public function store(CreateSitesRequest $request)
    {
        $input = $request->all();

        $id_site = DB::table('sites')->insertGetId(
            ['user_id' => $input['user_id'], 'type' => $input['type'], 'nom' => $input['nom']]
        );

        DB::table('site_user')->insert(['site_id' => $id_site, 'user_id' => Auth::user()->id]);

        $id_documents = DB::table('dossiers')->insertGetId(
            ['sites_id' => $id_site, 'name' => 'Documents', 'title' => 'Documents', 'description' => '', 'parent_id' => 0, 'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/documents']
        );

        $sous_dossiers = DefaultDossier($id_site,$id_documents);
        DB::table('dossiers')->insert($sous_dossiers);


        if($request->ajax()){
            return [
                'message' => 'success'
            ];
        }
    }

    /**
     * Display the specified Sites.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sites = $this->sitesRepository->find($id);

        if (empty($sites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        return view('sites.show')->with('sites', $sites);
    }

    /**
     * Show the form for editing the specified Sites.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sites = $this->sitesRepository->find($id);


        if (empty($sites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        return view('sites.edit')->with('sites', $sites);
    }

    /**
     * Update the specified Sites in storage.
     *
     * @param  int              $id
     * @param UpdateSitesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSitesRequest $request)
    {
        $sites = $this->sitesRepository->find($id);
        $input = $request->all();

        if (empty($sites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        // $sites = $this->sitesRepository->update($request->all(), $id);

        DB::table('sites')
        ->where('id', $id)
        ->limit(1)
        ->update(array('type' => $input['type'],
        'nom' => $input['nom']));


        Flash::success(__('messages.updated', ['model' => __('models/sites.singular')]));

        return redirect(route('sites.index'));
    }

    /**
     * Remove the specified Sites from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sites = $this->sitesRepository->find($id);

        if (empty($sites)) {
            Flash::error(__('messages.not_found', ['model' => __('models/sites.singular')]));

            return redirect(route('sites.index'));
        }

        $this->sitesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/sites.singular')]));

        return redirect(route('sites.index'));
    }

     /**
     * Remove the specified Sites from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function delete(Request $request)
    {
        $input = $request->all();
        $deletedRows = DB::table('sites')->where('id', $input['id'])->delete();
        if ($deletedRows > 0) {
            if ($request->ajax()) {
                return ['status' => 200];
            }
        } else {
            return ['status' => 201];
        }
    }
}
