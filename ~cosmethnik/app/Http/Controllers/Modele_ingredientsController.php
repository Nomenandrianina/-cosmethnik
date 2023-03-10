<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_ingredientsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_ingredientsRequest;
use App\Http\Requests\UpdateModele_ingredientsRequest;
use App\Repositories\Modele_ingredientsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Modele_ingredientsController extends AppBaseController
{
    /** @var  Modele_ingredientsRepository */
    private $modeleIngredientsRepository;

    public function __construct(Modele_ingredientsRepository $modeleIngredientsRepo)
    {
        $this->modeleIngredientsRepository = $modeleIngredientsRepo;
    }

    /**
     * Display a listing of the Modele_ingredients.
     *
     * @param Modele_ingredientsDataTable $modeleIngredientsDataTable
     * @return Response
     */
    public function index(Modele_ingredientsDataTable $modeleIngredientsDataTable)
    {
        return $modeleIngredientsDataTable->render('modele_ingredients.index');
    }

    /**
     * Show the form for creating a new Modele_ingredients.
     *
     * @return Response
     */
    public function create()
    {
        return view('modele_ingredients.create');
    }

    /**
     * Store a newly created Modele_ingredients in storage.
     *
     * @param CreateModele_ingredientsRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_ingredientsRequest $request)
    {
        $input = $request->all();

        $modeleIngredients = $this->modeleIngredientsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/modeleIngredients.singular')]));

        return redirect(route('modeleIngredients.index'));
    }

    /**
     * Display the specified Modele_ingredients.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modeleIngredients = $this->modeleIngredientsRepository->find($id);

        if (empty($modeleIngredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleIngredients.singular')]));

            return redirect(route('modeleIngredients.index'));
        }

        return view('modele_ingredients.show')->with('modeleIngredients', $modeleIngredients);
    }

    /**
     * Show the form for editing the specified Modele_ingredients.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modeleIngredients = $this->modeleIngredientsRepository->find($id);

        if (empty($modeleIngredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleIngredients.singular')]));

            return redirect(route('modeleIngredients.index'));
        }

        return view('modele_ingredients.edit')->with('modeleIngredients', $modeleIngredients);
    }

    /**
     * Update the specified Modele_ingredients in storage.
     *
     * @param  int              $id
     * @param UpdateModele_ingredientsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateModele_ingredientsRequest $request)
    {
        $modeleIngredients = $this->modeleIngredientsRepository->find($id);

        if (empty($modeleIngredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleIngredients.singular')]));

            return redirect(route('modeleIngredients.index'));
        }

        $modeleIngredients = $this->modeleIngredientsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/modeleIngredients.singular')]));

        return redirect(route('modeleIngredients.index'));
    }

    /**
     * Remove the specified Modele_ingredients from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modeleIngredients = $this->modeleIngredientsRepository->find($id);

        if (empty($modeleIngredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/modeleIngredients.singular')]));

            return redirect(route('modeleIngredients.index'));
        }

        $this->modeleIngredientsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/modeleIngredients.singular')]));

        return redirect(route('modeleIngredients.index'));
    }
}
