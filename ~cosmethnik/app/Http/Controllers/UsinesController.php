<?php

namespace App\Http\Controllers;

use App\DataTables\UsinesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUsinesRequest;
use App\Http\Requests\UpdateUsinesRequest;
use App\Repositories\UsinesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UsinesController extends AppBaseController
{
    /** @var  UsinesRepository */
    private $usinesRepository;

    public function __construct(UsinesRepository $usinesRepo)
    {
        $this->usinesRepository = $usinesRepo;
    }

    /**
     * Display a listing of the Usines.
     *
     * @param UsinesDataTable $usinesDataTable
     * @return Response
     */
    public function index(UsinesDataTable $usinesDataTable)
    {
        return $usinesDataTable->render('usines.index');
    }

    /**
     * Show the form for creating a new Usines.
     *
     * @return Response
     */
    public function create()
    {
        return view('usines.create');
    }

    /**
     * Store a newly created Usines in storage.
     *
     * @param CreateUsinesRequest $request
     *
     * @return Response
     */
    public function store(CreateUsinesRequest $request)
    {
        $input = $request->all();

        $usines = $this->usinesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/usines.singular')]));

        return redirect(route('usines.index'));
    }

    /**
     * Display the specified Usines.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usines = $this->usinesRepository->find($id);

        if (empty($usines)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usines.singular')]));

            return redirect(route('usines.index'));
        }

        return view('usines.show')->with('usines', $usines);
    }

    /**
     * Show the form for editing the specified Usines.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usines = $this->usinesRepository->find($id);

        if (empty($usines)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usines.singular')]));

            return redirect(route('usines.index'));
        }

        return view('usines.edit')->with('usines', $usines);
    }

    /**
     * Update the specified Usines in storage.
     *
     * @param  int              $id
     * @param UpdateUsinesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsinesRequest $request)
    {
        $usines = $this->usinesRepository->find($id);

        if (empty($usines)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usines.singular')]));

            return redirect(route('usines.index'));
        }

        $usines = $this->usinesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/usines.singular')]));

        return redirect(route('usines.index'));
    }

    /**
     * Remove the specified Usines from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usines = $this->usinesRepository->find($id);

        if (empty($usines)) {
            Flash::error(__('messages.not_found', ['model' => __('models/usines.singular')]));

            return redirect(route('usines.index'));
        }

        $this->usinesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/usines.singular')]));

        return redirect(route('usines.index'));
    }
}
