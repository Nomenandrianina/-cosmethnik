<?php

namespace App\Http\Controllers;

use App\DataTables\FamilleDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFamilleRequest;
use App\Http\Requests\UpdateFamilleRequest;
use App\Repositories\FamilleRepository;
use App\Models\Famille;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FamilleController extends AppBaseController
{
    /** @var  FamilleRepository */
    private $familleRepository;

    public function __construct(FamilleRepository $familleRepo)
    {
        $this->familleRepository = $familleRepo;
    }

    /**
     * Display a listing of the Famille.
     *
     * @param FamilleDataTable $familleDataTable
     * @return Response
     */
    public function index(FamilleDataTable $familleDataTable)
    {
        return $familleDataTable->render('familles.index');
    }

    /**
     * Show the form for creating a new Famille.
     *
     * @return Response
     */
    public function create()
    {
        $famille = Famille::where('parent_id', '=', 0)->get();
        $childs = Famille::pluck('nom','id');
        return view('familles.create',compact('famille','childs'));
    }

    /**
     * Get child of famille.
     *
     * @return Response
     */
    public function getChilds(Request $request)
    {
        if (!$request->idfamille) {
            $html = '<div class="form-group col-sm-6" id="sousfamille">
                {!! Form::label("sous_famille", "Sous Famille:") !!}
                {!! Form::select("sous_famille",[],null, ["class" => "form-control"]) !!}
            </div>';
        } else {
            $html = '';
            $childs = Famille::where('parent_id','=',$request->idfamille)->get();
            foreach ($childs as $item) {
                $html .= '<option value="'.$item->id.'">'.$item->nom.'</option>';
            }
            // $html .= '
            // <div class="form-group col-sm-6" id="sousfamille">
            //     {!! Form::label("sous_famille", "Sous Famille:") !!}
            //     {!! Form::select("sous_famille",'.$child.',null, ["class" => "form-control"]) !!}
            // </div>';
        }

        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created Famille in storage.
     *
     * @param CreateFamilleRequest $request
     *
     * @return Response
     */
    public function store(CreateFamilleRequest $request)
    {
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        DB::table('famille')->insert(
            ['nom' => $input['nom'],'parent_id' => $input['parent_id']]
        );

        Flash::success(__('messages.saved', ['model' => __('models/familles.singular')]));

        return redirect(route('familles.index'));
    }

    /**
     * Display the specified Famille.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        return view('familles.show')->with('famille', $famille);
    }

    /**
     * Show the form for editing the specified Famille.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        return view('familles.edit')->with('famille', $famille);
    }

    /**
     * Update the specified Famille in storage.
     *
     * @param  int              $id
     * @param UpdateFamilleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFamilleRequest $request)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        $famille = $this->familleRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/familles.singular')]));

        return redirect(route('familles.index'));
    }

    /**
     * Remove the specified Famille from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $famille = $this->familleRepository->find($id);

        if (empty($famille)) {
            Flash::error(__('messages.not_found', ['model' => __('models/familles.singular')]));

            return redirect(route('familles.index'));
        }

        $this->familleRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/familles.singular')]));

        return redirect(route('familles.index'));
    }
}
