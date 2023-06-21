<?php

namespace App\Http\Controllers;

use App\DataTables\NutrimentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateNutrimentsRequest;
use App\Http\Requests\UpdateNutrimentsRequest;
use App\Repositories\NutrimentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class NutrimentsController extends AppBaseController
{
    /** @var  NutrimentsRepository */
    private $nutrimentsRepository;

    public function __construct(NutrimentsRepository $nutrimentsRepo)
    {
        $this->nutrimentsRepository = $nutrimentsRepo;
    }

    /**
     * Display a listing of the Nutriments.
     *
     * @param NutrimentsDataTable $nutrimentsDataTable
     * @return Response
     */
    public function index(NutrimentsDataTable $nutrimentsDataTable)
    {
        return $nutrimentsDataTable->render('nutriments.index');
    }

    /**
     * Show the form for creating a new Nutriments.
     *
     * @return Response
     */
    public function create()
    {
        return view('nutriments.create');
    }

    /**
     * Store a newly created Nutriments in storage.
     *
     * @param CreateNutrimentsRequest $request
     *
     * @return Response
     */
    public function store(CreateNutrimentsRequest $request)
    {
        $input = $request->all();

        $nutriments = $this->nutrimentsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/nutriments.singular')]));

        return redirect(route('nutriments.index'));
    }

    /**
     * Display the specified Nutriments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nutriments = $this->nutrimentsRepository->find($id);

        if (empty($nutriments)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutriments.singular')]));

            return redirect(route('nutriments.index'));
        }

        return view('nutriments.show')->with('nutriments', $nutriments);
    }

    /**
     * Show the form for editing the specified Nutriments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nutriments = $this->nutrimentsRepository->find($id);

        if (empty($nutriments)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutriments.singular')]));

            return redirect(route('nutriments.index'));
        }

        return view('nutriments.edit')->with('nutriments', $nutriments);
    }

    /**
     * Update the specified Nutriments in storage.
     *
     * @param  int              $id
     * @param UpdateNutrimentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNutrimentsRequest $request)
    {
        $nutriments = $this->nutrimentsRepository->find($id);

        if (empty($nutriments)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutriments.singular')]));

            return redirect(route('nutriments.index'));
        }

        $nutriments = $this->nutrimentsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/nutriments.singular')]));

        return redirect(route('nutriments.index'));
    }

    /**
     * Remove the specified Nutriments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nutriments = $this->nutrimentsRepository->find($id);

        if (empty($nutriments)) {
            Flash::error(__('messages.not_found', ['model' => __('models/nutriments.singular')]));

            return redirect(route('nutriments.index'));
        }

        $this->nutrimentsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/nutriments.singular')]));

        return redirect(route('nutriments.index'));
    }
}
