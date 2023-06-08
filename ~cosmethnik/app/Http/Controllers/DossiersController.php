<?php

namespace App\Http\Controllers;

use App\DataTables\DossiersDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\CreateDossiersRequest;
use App\Http\Requests\UpdateDossiersRequest;
use App\Repositories\DossiersRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Famille;
use App\Models\Usines;
use App\Models\Unites;
use App\Models\Sites;
use App\Models\Dossiers;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Etat_produits;
use App\Models\Geographiques;
use App\Models\Marques;
use App\Models\Produit_fini;
use App\Models\Produit_semi_finis;
use Response;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Ressources;

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

    /**
     * Get Folder child
     */
    public function ajaxRequest(Request $request){
        $id_dossier = intval($request->dossier_id);
        $id_site = intval($request->site_id);
        $result = '';
        // $doc = Dossiers::where('parent_id', '=' ,$id_dossier)->get();
        $doc = Dossiers::where('sites_id','=',$id_site)->where('parent_id', '=', $id_dossier)->with('site')->get();
        if($doc->isEmpty() == true){
            $result = "<p style='text-align:center;margin: revert;'>Aucun élément trouvé</p>";
        }else{
            $ul = "<ul class='list-group list-group-flush' id='data-ul'>";
            $li = '';
            foreach($doc as $item){
                $li .='<li class="list-group-item">
                            <a onclick="getDetails('.$item->id.','.$id_site.',\''.$item->title.'\')" style="cursor:pointer">
                            <span class="one-span">
                            <span class="two-span"><i class="fas fa-folder fa-3x"></i></span>
                            <span class="three-span">'.$item->title.'
                                    <br>';
                                if ($item->description){
                                    $li = $li.'<small>'.$item->description.'</small></span>
                                    </span>
                                    </a>
                                    </li>';
                                }
                                else{
                                    $li = $li.'<small>Aucune description</small></span>
                                            </span>
                                            </a>
                                            </li>';
                                }
            }

            $endul = '</ul>';
            $result = $ul.$li.$endul;
        }
        return response()->json(['success'=> 200,'results' => $result]);
    }


    /**
     * Get details of folder
     */
    public function ajaxDetails(Request $request){
        $id_dossier = intval($request->dossier_id);
        $id_site = intval($request->site_id);
        $dossier_name = $request->dossier_title;

        $result = '';
        //Vérifier si le dossier sélectionner à un enfant
        $doc = Dossiers::where('sites_id','=',$id_site)->where('parent_id', '=', $id_dossier)->with('site')->get();
        //Si le dossier n'a pas d'enfant
        if($doc->isEmpty() == true){
            $ul = "<ul class='list-group list-group-flush' id='data-ul'>";
            $li = '';
            //Déterminer le Model du dossier
            $model = DeterminateObject($dossier_name)::all();
            //Si le Model est vide
            if($model->isEmpty() == true){
                $result = "<p style='text-align:center;margin: revert;'>Aucun élément trouvé</p>";
            //Si le model n'est pas vide alors il renvoye les listes du model en HTML
            }else{
                foreach($model as $item){
                    $li .='<li class="list-group-item">
                    <a onclick="getProprietes('.$item->id.','.$id_site.','.$id_dossier.',\''.$dossier_name.'\')" style="cursor:pointer">
                    <span class="one-span">
                            <span class="two-span">'.$item->icon().'</span>
                            <span class="three-span">'.$item->nom.'
                                 <br>';
                                if ($item->description){
                                    $li = $li.'<small>'.$item->description.'</small></span>
                                    </span>
                                    </a>
                                    </li>';
                                }
                                else{
                                    $li = $li.'<small>Aucune description</small></span>
                                            </span>
                                            </a>
                                            </li>';
                                }
                }
                $endul = "</ul>";
                $result = $ul.$li.$endul;
            }
        //Si le dossier a un enfant
        }else{
            $ul = "<ul class='list-group list-group-flush' id='data-ul'>";
            $li = '';
            foreach($doc as $item){
                $li .='<li class="list-group-item">
                                <a onclick="getDetails('.$item->id.','.$id_site.',\''.$item->title.'\')" style="cursor:pointer">
                                <span class="one-span">
                                        <span class="two-span"><i class="fas fa-folder fa-3x"></i></span>
                                        <span class="three-span">'.$item->title.'
                                             <br>';
                                            if ($item->description){
                                                $li = $li.'<small>'.$item->description.'</small></span>
                                                </span>
                                                </a>
                                                </li>';
                                            }
                                            else{
                                                $li = $li.'<small>Aucune description</small></span>
                                                        </span>
                                                        </a>
                                                        </li>';
                                            }
            }

            $endul = "</ul>";
            $result = $ul.$li.$endul;
        }
        return response()->json(['success'=> 200,'results' => $result]);
    }

    public function ajaxProprietes(Request $request){
        $id_model = intval($request->id_model);
        $site_id = intval($request->site_id);
        $id_dossier = intval($request->dossier_id);
        $dossier_parent = $request->dossier_parent;
        $site_texte = Sites::where('id','=', $site_id)->get();


        return response()->json([
            'status' => 200,
            'id_model' => $id_model,
            'id_site' => $site_id,
            'id_dossier' => $id_dossier,
            'dossier_parent' => $dossier_parent,
            'message' => 'success',
        ]);
    }



    public function showProprietes(Request $request){
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $object = DeterminateObject($dossier_parent);
        if($object::class == "App\Models\Ressources"){
            $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','unite'])->first();
            $menu = DeterminateObject($dossier_parent)::$fields;
            $icon = DeterminateObject($dossier_parent)->icon_menu();
            return view('proprietes.model' , compact('menu','site_texte','icon','dossier_parent','model','data'));
        }
        if($object::class == "App\Models\Produit_fini" || $object::class == "App\Models\Produit_semi_finis" || $object::class == "App\Models\Matiere_premiere"){
            $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
            $menu = DeterminateObject($dossier_parent)::$fields;
            $icon = DeterminateObject($dossier_parent)->icon_menu();
            return view('proprietes.model' , compact('menu','site_texte','icon','dossier_parent','model','data'));
        }else{
            $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->first();
            $menu = DeterminateObject($dossier_parent)::$fields;
            $icon = DeterminateObject($dossier_parent)->icon_menu();
            return view('proprietes.model' , compact('menu','site_texte','icon','dossier_parent','model','data'));
        }
    }


    /**
     * Fonction qui redirige vers une menu
     *
     * @param [int] $id
     * @return void
     */
    public function treeview($id = null)
    {
        $site_texte = Sites::where('id','=', $id)->get();
        $all = Sites::all();
        $famille = Famille::where('parent_id', '=', 0)->pluck('nom','id');
        $usines = Usines::pluck('description','id');
        $origines_geo = Geographiques::pluck('description','id');
        $etat_prod = Etat_produits::pluck('designation','id');
        $produitfini = Produit_fini::pluck('nom','id');
        $ressource = Ressources::pluck('nom','id');
        $marque = Marques::pluck('description','id');
        $unite = Unites::all();
        $sites = [];
        foreach($all as $item){
            $sites[$item->id] = $item->nom;
        }
        $doc = Dossiers::where('sites_id','=',$id)->where('parent_id', '=', 0)->with('site')->paginate(1);
        $allDoc = Dossiers::pluck('title','id')->all();
        $view = array(
            'id'=> $id,
            'sites'=> $sites,
            'doc' => $doc,
            'allDoc' => $allDoc,
            'famille' => $famille,
            'usines' => $usines,
            'origines_geo' => $origines_geo,
            'etat_prod' => $etat_prod,
            'modele' => $produitfini,
            'ressource' => $ressource,
            'marque' => $marque,
            'site_texte' => $site_texte,
            'unite' => $unite
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
