<?php

namespace App\Http\Controllers;

use App\DataTables\AllergenesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAllergenesRequest;
use App\Http\Requests\UpdateAllergenesRequest;
use App\Repositories\AllergenesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AllergenesController extends AppBaseController
{
    /** @var  AllergenesRepository */
    private $allergenesRepository;

    public function __construct(AllergenesRepository $allergenesRepo)
    {
        $this->allergenesRepository = $allergenesRepo;
    }

    /**
     * Display a listing of the Allergenes.
     *
     * @param AllergenesDataTable $allergenesDataTable
     * @return Response
     */
    public function index(AllergenesDataTable $allergenesDataTable)
    {
        return $allergenesDataTable->render('allergenes.index');
    }

    /**
     * Show the form for creating a new Allergenes.
     *
     * @return Response
     */
    public function create()
    {
        return view('allergenes.create');
    }

    /**
     * Store a newly created Allergenes in storage.
     *
     * @param CreateAllergenesRequest $request
     *
     * @return Response
     */
    public function store(CreateAllergenesRequest $request)
    {
        $input = $request->all();

        $allergenes = $this->allergenesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/allergenes.singular')]));

        return redirect(route('allergenes.index'));
    }

    /**
     * Display the specified Allergenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $allergenes = $this->allergenesRepository->find($id);

        if (empty($allergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allergenes.singular')]));

            return redirect(route('allergenes.index'));
        }

        return view('allergenes.show')->with('allergenes', $allergenes);
    }

    /**
     * Show the form for editing the specified Allergenes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $allergenes = $this->allergenesRepository->find($id);

        if (empty($allergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allergenes.singular')]));

            return redirect(route('allergenes.index'));
        }

        return view('allergenes.edit')->with('allergenes', $allergenes);
    }

    /**
     * Update the specified Allergenes in storage.
     *
     * @param  int              $id
     * @param UpdateAllergenesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAllergenesRequest $request)
    {
        $allergenes = $this->allergenesRepository->find($id);

        if (empty($allergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allergenes.singular')]));

            return redirect(route('allergenes.index'));
        }

        $allergenes = $this->allergenesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/allergenes.singular')]));

        return redirect(route('allergenes.index'));
    }

    /**
     * Remove the specified Allergenes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $allergenes = $this->allergenesRepository->find($id);

        if (empty($allergenes)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allergenes.singular')]));

            return redirect(route('allergenes.index'));
        }

        $this->allergenesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/allergenes.singular')]));

        return redirect(route('allergenes.index'));
    }
}
