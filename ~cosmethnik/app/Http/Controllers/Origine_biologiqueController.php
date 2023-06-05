<?php

namespace App\Http\Controllers;

use App\DataTables\Origine_biologiqueDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrigine_biologiqueRequest;
use App\Http\Requests\UpdateOrigine_biologiqueRequest;
use App\Repositories\Origine_biologiqueRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Origine_biologiqueController extends AppBaseController
{
    /** @var  Origine_biologiqueRepository */
    private $origineBiologiqueRepository;

    public function __construct(Origine_biologiqueRepository $origineBiologiqueRepo)
    {
        $this->origineBiologiqueRepository = $origineBiologiqueRepo;
    }

    /**
     * Display a listing of the Origine_biologique.
     *
     * @param Origine_biologiqueDataTable $origineBiologiqueDataTable
     * @return Response
     */
    public function index(Origine_biologiqueDataTable $origineBiologiqueDataTable)
    {
        return $origineBiologiqueDataTable->render('origine_biologiques.index');
    }

    /**
     * Show the form for creating a new Origine_biologique.
     *
     * @return Response
     */
    public function create()
    {
        return view('origine_biologiques.create');
    }

    /**
     * Store a newly created Origine_biologique in storage.
     *
     * @param CreateOrigine_biologiqueRequest $request
     *
     * @return Response
     */
    public function store(CreateOrigine_biologiqueRequest $request)
    {
        $input = $request->all();

        $origineBiologique = $this->origineBiologiqueRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/origineBiologiques.singular')]));

        return redirect(route('origineBiologiques.index'));
    }

    /**
     * Display the specified Origine_biologique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $origineBiologique = $this->origineBiologiqueRepository->find($id);

        if (empty($origineBiologique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/origineBiologiques.singular')]));

            return redirect(route('origineBiologiques.index'));
        }

        return view('origine_biologiques.show')->with('origineBiologique', $origineBiologique);
    }

    /**
     * Show the form for editing the specified Origine_biologique.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $origineBiologique = $this->origineBiologiqueRepository->find($id);

        if (empty($origineBiologique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/origineBiologiques.singular')]));

            return redirect(route('origineBiologiques.index'));
        }

        return view('origine_biologiques.edit')->with('origineBiologique', $origineBiologique);
    }

    /**
     * Update the specified Origine_biologique in storage.
     *
     * @param  int              $id
     * @param UpdateOrigine_biologiqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrigine_biologiqueRequest $request)
    {
        $origineBiologique = $this->origineBiologiqueRepository->find($id);

        if (empty($origineBiologique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/origineBiologiques.singular')]));

            return redirect(route('origineBiologiques.index'));
        }

        $origineBiologique = $this->origineBiologiqueRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/origineBiologiques.singular')]));

        return redirect(route('origineBiologiques.index'));
    }

    /**
     * Remove the specified Origine_biologique from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $origineBiologique = $this->origineBiologiqueRepository->find($id);

        if (empty($origineBiologique)) {
            Flash::error(__('messages.not_found', ['model' => __('models/origineBiologiques.singular')]));

            return redirect(route('origineBiologiques.index'));
        }

        $this->origineBiologiqueRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/origineBiologiques.singular')]));

        return redirect(route('origineBiologiques.index'));
    }
}
