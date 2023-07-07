<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\DashboardRepository;
use App\Repositories\SitesRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\Sites;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /** @var  DashboardRepository */
    private $dashboardRepository;
    private $sitesRepository;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DashboardRepository $dashboardRepo,SitesRepository $sitesRepo)
    {
        $this->dashboardRepository = $dashboardRepo;
        $this->sitesRepository = $sitesRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->dashboardRepository->GetData();
        $sites=$data['sites'];
        $dashboardInfo = $data['dashboardInfo'] ;
        $chartUserCheckin = $data['chartUserCheckin'];
        $produit_finis =  $data['produit_fini'];
        $users =  $data['users'];
        if (request()->ajax()) {
            return view('dashboard.index', compact('sites','produit_finis'))->render();
        }
        return view('dashboard.index', compact('sites','dashboardInfo','chartUserCheckin','produit_finis','users'));
    }

    public function catalogue(Request $request){
            $result = '';
            $ul = "<ul class='list-group list-group-flush' id='data-ul'>";
            $li = '';
            //Déterminer le Model du dossier
            $model = DeterminateObject($request->get('model'))::paginate(2);
            //Si le Model est vide
            if($model->isEmpty() == true){
                $result = "<p style='text-align:center;margin: revert;'>Aucun élément trouvé</p>";
            //Si le model n'est pas vide alors il renvoye les listes du model en HTML
            }else{
                foreach($model as $item){
                    $li .='<li class="list-group-item">
                    <a style="cursor:pointer">
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
                $endul = "</ul> <div class='d-flex justify-content-center'>".
                $model->links() ."</div>";
                $result = $ul.$li.$endul;
            }
            return response()->json(['success'=> 200,'results' => $result]);
    }
}
