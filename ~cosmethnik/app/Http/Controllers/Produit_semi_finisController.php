<?php

namespace App\Http\Controllers;

use App\DataTables\Produit_semi_finisDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProduit_semi_finisRequest;
use App\Http\Requests\UpdateProduit_semi_finisRequest;
use App\Repositories\Produit_semi_finisRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Produit_semi_finisController extends AppBaseController
{
    /** @var  Produit_semi_finisRepository */
    private $produitSemiFinisRepository;

    public function __construct(Produit_semi_finisRepository $produitSemiFinisRepo)
    {
        $this->produitSemiFinisRepository = $produitSemiFinisRepo;
    }

    /**
     * Display a listing of the Produit_semi_finis.
     *
     * @param Produit_semi_finisDataTable $produitSemiFinisDataTable
     * @return Response
     */
    public function index(Produit_semi_finisDataTable $produitSemiFinisDataTable)
    {
        return $produitSemiFinisDataTable->render('produit_semi_finis.index');
    }

    /**
     * Show the form for creating a new Produit_semi_finis.
     *
     * @return Response
     */
    public function create()
    {
        return view('produit_semi_finis.create');
    }

    /**
     * Store a newly created Produit_semi_finis in storage.
     *
     * @param CreateProduit_semi_finisRequest $request
     *
     * @return Response
     */
    public function store(CreateProduit_semi_finisRequest $request)
    {
        $input = $request->all();

        $produitSemiFinis = $this->produitSemiFinisRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/produitSemiFinis.singular')]));

        return redirect(route('produitSemiFinis.index'));
    }

    /**
     * Display the specified Produit_semi_finis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produitSemiFinis = $this->produitSemiFinisRepository->find($id);

        if (empty($produitSemiFinis)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitSemiFinis.singular')]));

            return redirect(route('produitSemiFinis.index'));
        }

        return view('produit_semi_finis.show')->with('produitSemiFinis', $produitSemiFinis);
    }

    /**
     * Show the form for editing the specified Produit_semi_finis.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produitSemiFinis = $this->produitSemiFinisRepository->find($id);

        if (empty($produitSemiFinis)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitSemiFinis.singular')]));

            return redirect(route('produitSemiFinis.index'));
        }

        return view('produit_semi_finis.edit')->with('produitSemiFinis', $produitSemiFinis);
    }

    /**
     * Update the specified Produit_semi_finis in storage.
     *
     * @param  int              $id
     * @param UpdateProduit_semi_finisRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduit_semi_finisRequest $request)
    {
        $produitSemiFinis = $this->produitSemiFinisRepository->find($id);

        if (empty($produitSemiFinis)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitSemiFinis.singular')]));

            return redirect(route('produitSemiFinis.index'));
        }

        $produitSemiFinis = $this->produitSemiFinisRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/produitSemiFinis.singular')]));

        return redirect(route('produitSemiFinis.index'));
    }

    /**
     * Remove the specified Produit_semi_finis from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produitSemiFinis = $this->produitSemiFinisRepository->find($id);

        if (empty($produitSemiFinis)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitSemiFinis.singular')]));

            return redirect(route('produitSemiFinis.index'));
        }

        $this->produitSemiFinisRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/produitSemiFinis.singular')]));

        return redirect(route('produitSemiFinis.index'));
    }
}
