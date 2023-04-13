<?php

namespace App\Http\Controllers;

use App\DataTables\IngredientsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIngredientsRequest;
use App\Http\Requests\UpdateIngredientsRequest;
use App\Repositories\IngredientsRepository;
use Flash;
use App\Models\Geographiques;
use App\Http\Controllers\AppBaseController;
use Response;

class IngredientsController extends AppBaseController
{
    /** @var  IngredientsRepository */
    private $ingredientsRepository;

    public function __construct(IngredientsRepository $ingredientsRepo)
    {
        $this->ingredientsRepository = $ingredientsRepo;
    }

    /**
     * Display a listing of the Ingredients.
     *
     * @param IngredientsDataTable $ingredientsDataTable
     * @return Response
     */
    public function index(IngredientsDataTable $ingredientsDataTable)
    {
        return $ingredientsDataTable->render('ingredients.index');
    }

    /**
     * Show the form for creating a new Ingredients.
     *
     * @return Response
     */
    public function create()
    {
        $origines_geo = Geographiques::select('description')->get();
        // $views =array(
        //     'origines_geo' => $origines_geo,
        // );
        return view('ingredients.create',compact('origines_geo'));
    }


    /**
     * Store a newly created Ingredients in storage.
     *
     * @param CreateIngredientsRequest $request
     *
     * @return Response
     */
    public function store(CreateIngredientsRequest $request)
    {
        $input = $request->all();

        $ingredients = $this->ingredientsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/ingredients.singular')]));

        return redirect(route('ingredients.index'));
    }

    /**
     * Display the specified Ingredients.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ingredients = $this->ingredientsRepository->find($id);

        if (empty($ingredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ingredients.singular')]));

            return redirect(route('ingredients.index'));
        }

        return view('ingredients.show')->with('ingredients', $ingredients);
    }

    /**
     * Show the form for editing the specified Ingredients.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ingredients = $this->ingredientsRepository->find($id);

        if (empty($ingredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ingredients.singular')]));

            return redirect(route('ingredients.index'));
        }

        return view('ingredients.edit')->with('ingredients', $ingredients);
    }

    /**
     * Update the specified Ingredients in storage.
     *
     * @param  int              $id
     * @param UpdateIngredientsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIngredientsRequest $request)
    {
        $ingredients = $this->ingredientsRepository->find($id);

        if (empty($ingredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ingredients.singular')]));

            return redirect(route('ingredients.index'));
        }

        $ingredients = $this->ingredientsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/ingredients.singular')]));

        return redirect(route('ingredients.index'));
    }

    /**
     * Remove the specified Ingredients from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ingredients = $this->ingredientsRepository->find($id);

        if (empty($ingredients)) {
            Flash::error(__('messages.not_found', ['model' => __('models/ingredients.singular')]));

            return redirect(route('ingredients.index'));
        }

        $this->ingredientsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/ingredients.singular')]));

        return redirect(route('ingredients.index'));
    }
}
