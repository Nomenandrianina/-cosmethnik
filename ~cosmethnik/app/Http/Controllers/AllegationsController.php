<?php

namespace App\Http\Controllers;

use App\DataTables\AllegationsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAllegationsRequest;
use App\Http\Requests\UpdateAllegationsRequest;
use App\Repositories\AllegationsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AllegationsController extends AppBaseController
{
    /** @var  AllegationsRepository */
    private $allegationsRepository;

    public function __construct(AllegationsRepository $allegationsRepo)
    {
        $this->allegationsRepository = $allegationsRepo;
    }

    /**
     * Display a listing of the Allegations.
     *
     * @param AllegationsDataTable $allegationsDataTable
     * @return Response
     */
    public function index(AllegationsDataTable $allegationsDataTable)
    {
        return $allegationsDataTable->render('allegations.index');
    }

    /**
     * Show the form for creating a new Allegations.
     *
     * @return Response
     */
    public function create()
    {
        return view('allegations.create');
    }

    /**
     * Store a newly created Allegations in storage.
     *
     * @param CreateAllegationsRequest $request
     *
     * @return Response
     */
    public function store(CreateAllegationsRequest $request)
    {
        $input = $request->all();

        $allegations = $this->allegationsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/allegations.singular')]));

        return redirect(route('allegations.index'));
    }

    /**
     * Display the specified Allegations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $allegations = $this->allegationsRepository->find($id);

        if (empty($allegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allegations.singular')]));

            return redirect(route('allegations.index'));
        }

        return view('allegations.show')->with('allegations', $allegations);
    }

    /**
     * Show the form for editing the specified Allegations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $allegations = $this->allegationsRepository->find($id);

        if (empty($allegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allegations.singular')]));

            return redirect(route('allegations.index'));
        }

        return view('allegations.edit')->with('allegations', $allegations);
    }

    /**
     * Update the specified Allegations in storage.
     *
     * @param  int              $id
     * @param UpdateAllegationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAllegationsRequest $request)
    {
        $allegations = $this->allegationsRepository->find($id);

        if (empty($allegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allegations.singular')]));

            return redirect(route('allegations.index'));
        }

        $allegations = $this->allegationsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/allegations.singular')]));

        return redirect(route('allegations.index'));
    }

    /**
     * Remove the specified Allegations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $allegations = $this->allegationsRepository->find($id);

        if (empty($allegations)) {
            Flash::error(__('messages.not_found', ['model' => __('models/allegations.singular')]));

            return redirect(route('allegations.index'));
        }

        $this->allegationsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/allegations.singular')]));

        return redirect(route('allegations.index'));
    }
}
