<?php

namespace App\Http\Controllers;

use App\DataTables\Etat_produitsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEtat_produitsRequest;
use App\Http\Requests\UpdateEtat_produitsRequest;
use App\Repositories\Etat_produitsRepository;
use Illuminate\Support\Facades\DB;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Etat_produitsController extends AppBaseController
{
    /** @var  Etat_produitsRepository */
    private $etatProduitsRepository;

    public function __construct(Etat_produitsRepository $etatProduitsRepo)
    {
        $this->etatProduitsRepository = $etatProduitsRepo;
    }

    /**
     * Display a listing of the Etat_produits.
     *
     * @param Etat_produitsDataTable $etatProduitsDataTable
     * @return Response
     */
    public function index(Etat_produitsDataTable $etatProduitsDataTable)
    {
        return $etatProduitsDataTable->render('etat_produits.index');
    }

    /**
     * Show the form for creating a new Etat_produits.
     *
     * @return Response
     */
    public function create()
    {
        return view('etat_produits.create');
    }

    /**
     * Store a newly created Etat_produits in storage.
     *
     * @param CreateEtat_produitsRequest $request
     *
     * @return Response
     */
    public function store(CreateEtat_produitsRequest $request)
    {
        $input = $request->all();

        // $etatProduits = $this->etatProduitsRepository->create($input);

        DB::table('etat_produit')->insert(
            ['designation' => $input['designation']]
        );

        Flash::success(__('messages.saved', ['model' => __('models/etatProduits.singular')]));

        return redirect(route('etatProduits.index'));
    }

    /**
     * Display the specified Etat_produits.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $etatProduits = $this->etatProduitsRepository->find($id);

        if (empty($etatProduits)) {
            Flash::error(__('messages.not_found', ['model' => __('models/etatProduits.singular')]));

            return redirect(route('etatProduits.index'));
        }

        return view('etat_produits.show')->with('etatProduits', $etatProduits);
    }

    /**
     * Show the form for editing the specified Etat_produits.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $etatProduits = $this->etatProduitsRepository->find($id);

        if (empty($etatProduits)) {
            Flash::error(__('messages.not_found', ['model' => __('models/etatProduits.singular')]));

            return redirect(route('etatProduits.index'));
        }

        return view('etat_produits.edit')->with('etatProduits', $etatProduits);
    }

    /**
     * Update the specified Etat_produits in storage.
     *
     * @param  int              $id
     * @param UpdateEtat_produitsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEtat_produitsRequest $request)
    {
        $etatProduits = $this->etatProduitsRepository->find($id);

        if (empty($etatProduits)) {
            Flash::error(__('messages.not_found', ['model' => __('models/etatProduits.singular')]));

            return redirect(route('etatProduits.index'));
        }

        $etatProduits = $this->etatProduitsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/etatProduits.singular')]));

        return redirect(route('etatProduits.index'));
    }

    /**
     * Remove the specified Etat_produits from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $etatProduits = $this->etatProduitsRepository->find($id);

        if (empty($etatProduits)) {
            Flash::error(__('messages.not_found', ['model' => __('models/etatProduits.singular')]));

            return redirect(route('etatProduits.index'));
        }

        $this->etatProduitsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/etatProduits.singular')]));

        return redirect(route('etatProduits.index'));
    }
}
