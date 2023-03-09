<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCondition_conservationsRequest;
use App\Http\Requests\UpdateCondition_conservationsRequest;
use App\Repositories\Condition_conservationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Condition_conservationsController extends AppBaseController
{
    /** @var  Condition_conservationsRepository */
    private $conditionConservationsRepository;

    public function __construct(Condition_conservationsRepository $conditionConservationsRepo)
    {
        $this->conditionConservationsRepository = $conditionConservationsRepo;
    }

    /**
     * Display a listing of the Condition_conservations.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $conditionConservations = $this->conditionConservationsRepository->paginate(10);

        return view('condition_conservations.index')
            ->with('conditionConservations', $conditionConservations);
    }

    /**
     * Show the form for creating a new Condition_conservations.
     *
     * @return Response
     */
    public function create()
    {
        return view('condition_conservations.create');
    }

    /**
     * Store a newly created Condition_conservations in storage.
     *
     * @param CreateCondition_conservationsRequest $request
     *
     * @return Response
     */
    public function store(CreateCondition_conservationsRequest $request)
    {
        $input = $request->all();

        $conditionConservations = $this->conditionConservationsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/conditionConservations.singular')]));

        return redirect(route('conditionConservations.index'));
    }

    /**
     * Display the specified Condition_conservations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $conditionConservations = $this->conditionConservationsRepository->find($id);

        if (empty($conditionConservations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/conditionConservations.singular')]));

            return redirect(route('conditionConservations.index'));
        }

        return view('condition_conservations.show')->with('conditionConservations', $conditionConservations);
    }

    /**
     * Show the form for editing the specified Condition_conservations.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $conditionConservations = $this->conditionConservationsRepository->find($id);

        if (empty($conditionConservations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/conditionConservations.singular')]));

            return redirect(route('conditionConservations.index'));
        }

        return view('condition_conservations.edit')->with('conditionConservations', $conditionConservations);
    }

    /**
     * Update the specified Condition_conservations in storage.
     *
     * @param int $id
     * @param UpdateCondition_conservationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCondition_conservationsRequest $request)
    {
        $conditionConservations = $this->conditionConservationsRepository->find($id);

        if (empty($conditionConservations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/conditionConservations.singular')]));

            return redirect(route('conditionConservations.index'));
        }

        $conditionConservations = $this->conditionConservationsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/conditionConservations.singular')]));

        return redirect(route('conditionConservations.index'));
    }

    /**
     * Remove the specified Condition_conservations from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $conditionConservations = $this->conditionConservationsRepository->find($id);

        if (empty($conditionConservations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/conditionConservations.singular')]));

            return redirect(route('conditionConservations.index'));
        }

        $this->conditionConservationsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/conditionConservations.singular')]));

        return redirect(route('conditionConservations.index'));
    }
}
