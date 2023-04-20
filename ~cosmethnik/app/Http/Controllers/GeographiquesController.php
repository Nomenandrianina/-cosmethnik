<?php

namespace App\Http\Controllers;

use App\DataTables\GeographiquesDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\CreateGeographiquesRequest;
use App\Http\Requests\UpdateGeographiquesRequest;
use App\Repositories\GeographiquesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GeographiquesController extends AppBaseController
{
    /** @var  GeographiquesRepository */
    private $geographiquesRepository;

    public function __construct(GeographiquesRepository $geographiquesRepo)
    {
        $this->geographiquesRepository = $geographiquesRepo;
    }

    /**
     * Display a listing of the Geographiques.
     *
     * @param GeographiquesDataTable $geographiquesDataTable
     * @return Response
     */
    public function index(GeographiquesDataTable $geographiquesDataTable)
    {
        return $geographiquesDataTable->render('geographiques.index');
    }

    /**
     * Show the form for creating a new Geographiques.
     *
     * @return Response
     */
    public function create()
    {
        return view('geographiques.create');
    }

    /**
     * Store a newly created Geographiques in storage.
     *
     * @param CreateGeographiquesRequest $request
     *function
     * @return Response
     */
    public  store(CreateGeographiquesRequest $request)
    {
        $input = $request->all();

        // $geographiques = $this->geographiquesRepository->create($input);
        DB::table('geographique')->insert(
            ['description' => $input['description']]
        );

        Flash::success(__('messages.saved', ['model' => __('models/geographiques.singular')]));

        return redirect(route('geographiques.index'));
    }

    /**
     * Display the specified Geographiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $geographiques = $this->geographiquesRepository->find($id);

        if (empty($geographiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/geographiques.singular')]));

            return redirect(route('geographiques.index'));
        }

        return view('geographiques.show')->with('geographiques', $geographiques);
    }

    /**
     * Show the form for editing the specified Geographiques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $geographiques = $this->geographiquesRepository->find($id);

        if (empty($geographiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/geographiques.singular')]));

            return redirect(route('geographiques.index'));
        }

        return view('geographiques.edit')->with('geographiques', $geographiques);
    }

    /**
     * Update the specified Geographiques in storage.
     *
     * @param  int              $id
     * @param UpdateGeographiquesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGeographiquesRequest $request)
    {
        $geographiques = $this->geographiquesRepository->find($id);

        if (empty($geographiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/geographiques.singular')]));

            return redirect(route('geographiques.index'));
        }

        $geographiques = $this->geographiquesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/geographiques.singular')]));

        return redirect(route('geographiques.index'));
    }

    /**
     * Remove the specified Geographiques from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $geographiques = $this->geographiquesRepository->find($id);

        if (empty($geographiques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/geographiques.singular')]));

            return redirect(route('geographiques.index'));
        }

        $this->geographiquesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/geographiques.singular')]));

        return redirect(route('geographiques.index'));
    }
}
