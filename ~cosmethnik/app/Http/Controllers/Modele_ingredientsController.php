<?php

namespace App\Http\Controllers;

use App\DataTables\Modele_ingredientsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateModele_ingredientsRequest;
use App\Http\Requests\UpdateModele_ingredientsRequest;
use App\Repositories\Modele_ingredientsRepository;
use Flash;
use Illuminate\Http\Request;
use App\Models\Sites;
use App\Models\Unites;
use App\Models\Emballages;
use App\Models\Ingredients;
use App\Models\Modele_ingredients;
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
     * Insertion d'une nouvelle modele ingredients
     *
     * @param CreateModele_ingredientsRequest $request
     *
     * @return Response
     */
    public function store(CreateModele_ingredientsRequest $request)
    {
        $input = $request->all();

        // $modeleIngredients = $this->modeleIngredientsRepository->create($input);

        $input = $request->all();
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;

        $model = DeterminateObject($dossier_parent)::find($id_model);

        $modeleingredients = new Modele_ingredients;
        $modeleingredients->quantite = $input['quantite'];
        $modeleingredients->ogm = $request->has('omg');
        $modeleingredients->ionisation = $request->has('ionisation');
        $modeleingredients->auxilliaire_technologie = $request->has('auxiliaire');
        $modeleingredients->support = $request->has('support');
        $modeleingredients->ingredient_id = $request->ingredient;
        $model->mmodele_ingredients()->save($modeleingredients);

        Flash::success(__('messages.saved', ['model' => __('models/modeleIngredients.singular')]));

        return back();
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function model(Request $request,Modele_ingredientsDataTable $modeleIngredientsDataTable)
    {
        $id_model = intval($request->id_model);
        $site_id = intval($request->id_site);
        $id_dossier = intval($request->id_dossier);
        $dossier_parent = $request->dossier_parent;
        $data = [$id_model,$site_id,$id_dossier,$dossier_parent];
        $site_texte = Sites::where('id','=', $site_id)->get();
        $emballages = Emballages::all();
        $unite = Unites::all();
        $ingredients = Ingredients::all();
        $model = DeterminateObject($dossier_parent)::where("id","=",$id_model)->where("dossier_id","=",$id_dossier)->with(['etat_produit','usine','filiale','marque','geographique','client'])->first();
        $menu = DeterminateObject($dossier_parent)::$fields;
        $icon = DeterminateObject($dossier_parent)->icon_menu();
        $object = DeterminateObject($dossier_parent)::class;
        return $modeleIngredientsDataTable->with(['model_id' => $id_model,'model_type' => $object])->render('modele_ingredients.model', compact('menu','ingredients','site_texte','icon','dossier_parent','model','data','emballages','unite','object'));
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
