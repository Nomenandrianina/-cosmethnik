<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\DashboardRepository;
use App\Repositories\SitesRepository;
use App\Models\Sites;

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
        return view('dashboard.index', $data);

    }
}
