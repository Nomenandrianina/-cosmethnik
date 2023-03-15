<?php

namespace App\Http\Controllers;

use App\DataTables\Produit_finiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProduit_finiRequest;
use App\Http\Requests\UpdateProduit_finiRequest;
use App\Repositories\Produit_finiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Produit_finiController extends AppBaseController
{
    /** @var  Produit_finiRepository */
    private $produitFiniRepository;

    public function __construct(Produit_finiRepository $produitFiniRepo)
    {
        $this->produitFiniRepository = $produitFiniRepo;
    }

    /**
     * Display a listing of the Produit_fini.
     *
     * @param Produit_finiDataTable $produitFiniDataTable
     * @return Response
     */
    public function index(Produit_finiDataTable $produitFiniDataTable)
    {
        return $produitFiniDataTable->render('produit_finis.index');
    }

    /**
     * Show the form for creating a new Produit_fini.
     *
     * @return Response
     */
    public function create()
    {
        return view('produit_finis.create');
    }

    /**
     * Store a newly created Produit_fini in storage.
     *
     * @param CreateProduit_finiRequest $request
     *
     * @return Response
     */
    public function store(CreateProduit_finiRequest $request)
    {
        $input = $request->all();
        dd($input);

        // $produitFini = $this->produitFiniRepository->create($input);
        DB::table('dossiers')->insert(
            ['nom' => $input['nom'],'libelle_commerciale' => $input['libelle_commerciale'], 'title' => $input['title'],'parent_id' => $input['parent_id'], 'description' => $input['description'], 'link' => $input['link']]
        );

        Flash::success(__('messages.saved', ['model' => __('models/produitFinis.singular')]));

        return redirect(route('produitFinis.index'));
    }

    /**
     * Display the specified Produit_fini.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produitFini = $this->produitFiniRepository->find($id);

        if (empty($produitFini)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitFinis.singular')]));

            return redirect(route('produitFinis.index'));
        }

        return view('produit_finis.show')->with('produitFini', $produitFini);
    }

    /**
     * Show the form for editing the specified Produit_fini.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produitFini = $this->produitFiniRepository->find($id);

        if (empty($produitFini)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitFinis.singular')]));

            return redirect(route('produitFinis.index'));
        }

        return view('produit_finis.edit')->with('produitFini', $produitFini);
    }

    /**
     * Update the specified Produit_fini in storage.
     *
     * @param  int              $id
     * @param UpdateProduit_finiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProduit_finiRequest $request)
    {
        $produitFini = $this->produitFiniRepository->find($id);

        if (empty($produitFini)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitFinis.singular')]));

            return redirect(route('produitFinis.index'));
        }

        $produitFini = $this->produitFiniRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/produitFinis.singular')]));

        return redirect(route('produitFinis.index'));
    }

    /**
     * Remove the specified Produit_fini from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produitFini = $this->produitFiniRepository->find($id);

        if (empty($produitFini)) {
            Flash::error(__('messages.not_found', ['model' => __('models/produitFinis.singular')]));

            return redirect(route('produitFinis.index'));
        }

        $this->produitFiniRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/produitFinis.singular')]));

        return redirect(route('produitFinis.index'));
    }
}
