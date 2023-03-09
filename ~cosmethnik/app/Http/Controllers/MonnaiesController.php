<?php

namespace App\Http\Controllers;

use App\DataTables\MonnaiesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMonnaiesRequest;
use App\Http\Requests\UpdateMonnaiesRequest;
use App\Repositories\MonnaiesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MonnaiesController extends AppBaseController
{
    /** @var  MonnaiesRepository */
    private $monnaiesRepository;

    public function __construct(MonnaiesRepository $monnaiesRepo)
    {
        $this->monnaiesRepository = $monnaiesRepo;
    }

    /**
     * Display a listing of the Monnaies.
     *
     * @param MonnaiesDataTable $monnaiesDataTable
     * @return Response
     */
    public function index(MonnaiesDataTable $monnaiesDataTable)
    {
        return $monnaiesDataTable->render('monnaies.index');
    }

    /**
     * Show the form for creating a new Monnaies.
     *
     * @return Response
     */
    public function create()
    {
        return view('monnaies.create');
    }

    /**
     * Store a newly created Monnaies in storage.
     *
     * @param CreateMonnaiesRequest $request
     *
     * @return Response
     */
    public function store(CreateMonnaiesRequest $request)
    {
        $input = $request->all();

        $monnaies = $this->monnaiesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/monnaies.singular')]));

        return redirect(route('monnaies.index'));
    }

    /**
     * Display the specified Monnaies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $monnaies = $this->monnaiesRepository->find($id);

        if (empty($monnaies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/monnaies.singular')]));

            return redirect(route('monnaies.index'));
        }

        return view('monnaies.show')->with('monnaies', $monnaies);
    }

    /**
     * Show the form for editing the specified Monnaies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $monnaies = $this->monnaiesRepository->find($id);

        if (empty($monnaies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/monnaies.singular')]));

            return redirect(route('monnaies.index'));
        }

        return view('monnaies.edit')->with('monnaies', $monnaies);
    }

    /**
     * Update the specified Monnaies in storage.
     *
     * @param  int              $id
     * @param UpdateMonnaiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonnaiesRequest $request)
    {
        $monnaies = $this->monnaiesRepository->find($id);

        if (empty($monnaies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/monnaies.singular')]));

            return redirect(route('monnaies.index'));
        }

        $monnaies = $this->monnaiesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/monnaies.singular')]));

        return redirect(route('monnaies.index'));
    }

    /**
     * Remove the specified Monnaies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $monnaies = $this->monnaiesRepository->find($id);

        if (empty($monnaies)) {
            Flash::error(__('messages.not_found', ['model' => __('models/monnaies.singular')]));

            return redirect(route('monnaies.index'));
        }

        $this->monnaiesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/monnaies.singular')]));

        return redirect(route('monnaies.index'));
    }
}
