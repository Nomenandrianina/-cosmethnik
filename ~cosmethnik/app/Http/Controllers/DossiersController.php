<?php

namespace App\Http\Controllers;

use App\DataTables\DossiersDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\CreateDossiersRequest;
use App\Http\Requests\UpdateDossiersRequest;
use App\Repositories\DossiersRepository;
use Illuminate\Http\Request;
use App\Models\Famille;
use App\Models\Sites;
use App\Models\Dossiers;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class DossiersController extends AppBaseController
{
    /** @var  DossiersRepository */
    private $dossiersRepository;

    public function __construct(DossiersRepository $dossiersRepo)
    {
        $this->dossiersRepository = $dossiersRepo;
    }

    /**
     * Display a listing of the Dossiers.
     *
     * @param DossiersDataTable $dossiersDataTable
     * @return Response
     */
    public function index(DossiersDataTable $dossiersDataTable)
    {
        return $dossiersDataTable->render('dossiers.index');
    }


    public function ajaxRequest(Request $request){
        $id = intval($request->dossier_id);
        $result = '';
        $doc = Dossiers::where('parent_id', '=' ,$id)->get();
        if($doc->isEmpty() == true){
            $result = "<p style='text-align:center;margin: revert;'>Aucun élément trouvé</p>";
        }else{
            $ul = "<ul class='list-group list-group-flush' id='data-ul'>";
            $li = '';
            foreach($doc as $item){
                $li .="<li class='list-group-item'>
                                <a onclick='actions(".$item->id.")' style='cursor:pointer'>
                                <span class='one-span'>
                                        <span class='two-span'><i class='fas fa-folder fa-3x'></i></span>
                                        <span class='three-span'>".$item->title."
                                             <br>";
                                            if ($item->description){
                                                $li = $li."<small>".$item->description."</small></span>
                                                </span>
                                                </a>
                                                </li>";
                                            }
                                            else{
                                                $li = $li."<small>Aucune description</small></span>
                                                        </span>
                                                        </a>
                                                        </li>";
                                            }
            }

            $endul = "</ul>";
            $result = $ul.$li.$endul;
        }
        return response()->json(['success'=> 200,'results' => $result]);
    }
    public function treeview($id = null)
    {
        $all = Sites::all();
        $famille = Famille::where('parent_id', '=', 0)->pluck('nom','id');
        $sites = [];
        foreach($all as $item){
            $sites[$item->id] = $item->nom;
        }
        $doc = Dossiers::where('sites_id','=',$id)->where('parent_id', '=', 0)->with('site')->get();
        $allDoc = Dossiers::pluck('title','id')->all();
        $view = array(
            'id'=> $id,
            'sites'=> $sites,
            'doc' => $doc,
            'allDoc' => $allDoc,
            'famille' => $famille,
        );
        return view('dossiers.treeview',$view);
    }

    /**
     * Show the form for creating a new Dossiers.
     *
     * @return Response
     */
    public function create()
    {
        $all = Sites::all();
        $sites = [];
        foreach($all as $item){
            $sites[$item->id] = $item->nom;
        }
        $doc = Dossiers::where('parent_id', '=', 0)->get();
        $allDoc = Dossiers::pluck('title','id')->all();
        return view('dossiers.create',compact('sites','doc','allDoc'));
    }

    /**
     * Store a newly created Dossiers in storage.
     *
     * @param CreateDossiersRequest $request
     *
     * @return Response
     */
    public function store(CreateDossiersRequest $request)
    {
        dd('test');
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        // $dossiers = $this->dossiersRepository->create($input);

        DB::table('dossiers')->insert(
            ['sites_id' => $input['sites_id'],'name' => $input['name'], 'title' => $input['title'],'parent_id' => $input['parent_id'], 'description' => $input['description'], 'link' => $input['link']]
        );

        Flash::success(__('messages.saved', ['model' => __('models/dossiers.singular')]));

        $url_return="dossiers.index";
        if(Auth::user()->role_text != "supper-admin"){
            return back();
        }

        return redirect(route($url_return));
    }

    /**
     * Display the specified Dossiers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dossiers = $this->dossiersRepository->find($id);
        if (empty($dossiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dossiers.singular')]));

            return redirect(route('dossiers.index'));
        }

        return view('dossiers.show')->with('dossiers', $dossiers);
    }

    /**
     * Show the form for editing the specified Dossiers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dossiers = $this->dossiersRepository->find($id);

        if (empty($dossiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dossiers.singular')]));

            return redirect(route('dossiers.index'));
        }

        return view('dossiers.edit')->with('dossiers', $dossiers);
    }

    /**
     * Update the specified Dossiers in storage.
     *
     * @param  int              $id
     * @param UpdateDossiersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDossiersRequest $request)
    {
        $dossiers = $this->dossiersRepository->find($id);
        $input = $request->all();

        if (empty($dossiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dossiers.singular')]));

            return redirect(route('dossiers.index'));
        }

        // $dossiers = $this->dossiersRepository->update($request->all(), $id);

        DB::table('dossiers')
        ->where('id', $id)
        ->limit(1)
        ->update(array('name' => $input['name'],
        'title' => $input['title']));

        Flash::success(__('messages.updated', ['model' => __('models/dossiers.singular')]));

        return redirect(route('dossiers.index'));
    }

    /**
     * Remove the specified Dossiers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dossiers = $this->dossiersRepository->find($id);

        if (empty($dossiers)) {
            Flash::error(__('messages.not_found', ['model' => __('models/dossiers.singular')]));

            return redirect(route('dossiers.index'));
        }

        $this->dossiersRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/dossiers.singular')]));

        return redirect(route('dossiers.index'));
    }
}
