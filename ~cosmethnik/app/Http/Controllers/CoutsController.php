<?php

namespace App\Http\Controllers;

use App\DataTables\CoutsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCoutsRequest;
use App\Http\Requests\UpdateCoutsRequest;
use App\Repositories\CoutsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CoutsController extends AppBaseController
{
    /** @var  CoutsRepository */
    private $coutsRepository;

    public function __construct(CoutsRepository $coutsRepo)
    {
        $this->coutsRepository = $coutsRepo;
    }

    /**
     * Display a listing of the Couts.
     *
     * @param CoutsDataTable $coutsDataTable
     * @return Response
     */
    public function index(CoutsDataTable $coutsDataTable)
    {
        return $coutsDataTable->render('couts.index');
    }

    /**
     * Show the form for creating a new Couts.
     *
     * @return Response
     */
    public function create()
    {
        return view('couts.create');
    }

    /**
     * Store a newly created Couts in storage.
     *
     * @param CreateCoutsRequest $request
     *
     * @return Response
     */
    public function store(CreateCoutsRequest $request)
    {
        $input = $request->all();

        $couts = $this->coutsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/couts.singular')]));

        return redirect(route('couts.index'));
    }

    /**
     * Display the specified Couts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $couts = $this->coutsRepository->find($id);

        if (empty($couts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/couts.singular')]));

            return redirect(route('couts.index'));
        }

        return view('couts.show')->with('couts', $couts);
    }

    /**
     * Show the form for editing the specified Couts.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $couts = $this->coutsRepository->find($id);

        if (empty($couts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/couts.singular')]));

            return redirect(route('couts.index'));
        }

        return view('couts.edit')->with('couts', $couts);
    }

    /**
     * Update the specified Couts in storage.
     *
     * @param  int              $id
     * @param UpdateCoutsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoutsRequest $request)
    {
        $couts = $this->coutsRepository->find($id);

        if (empty($couts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/couts.singular')]));

            return redirect(route('couts.index'));
        }

        $couts = $this->coutsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/couts.singular')]));

        return redirect(route('couts.index'));
    }

    /**
     * Remove the specified Couts from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $couts = $this->coutsRepository->find($id);

        if (empty($couts)) {
            Flash::error(__('messages.not_found', ['model' => __('models/couts.singular')]));

            return redirect(route('couts.index'));
        }

        $this->coutsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/couts.singular')]));

        return redirect(route('couts.index'));
    }
}
