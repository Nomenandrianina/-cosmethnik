<?php

namespace App\Http\Controllers;

use App\DataTables\MarquesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMarquesRequest;
use App\Http\Requests\UpdateMarquesRequest;
use App\Repositories\MarquesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MarquesController extends AppBaseController
{
    /** @var  MarquesRepository */
    private $marquesRepository;

    public function __construct(MarquesRepository $marquesRepo)
    {
        $this->marquesRepository = $marquesRepo;
    }

    /**
     * Display a listing of the Marques.
     *
     * @param MarquesDataTable $marquesDataTable
     * @return Response
     */
    public function index(MarquesDataTable $marquesDataTable)
    {
        return $marquesDataTable->render('marques.index');
    }

    /**
     * Show the form for creating a new Marques.
     *
     * @return Response
     */
    public function create()
    {
        return view('marques.create');
    }

    /**
     * Store a newly created Marques in storage.
     *
     * @param CreateMarquesRequest $request
     *
     * @return Response
     */
    public function store(CreateMarquesRequest $request)
    {
        $input = $request->all();

        $marques = $this->marquesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/marques.singular')]));

        return redirect(route('marques.index'));
    }

    /**
     * Display the specified Marques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marques = $this->marquesRepository->find($id);

        if (empty($marques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marques.singular')]));

            return redirect(route('marques.index'));
        }

        return view('marques.show')->with('marques', $marques);
    }

    /**
     * Show the form for editing the specified Marques.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marques = $this->marquesRepository->find($id);

        if (empty($marques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marques.singular')]));

            return redirect(route('marques.index'));
        }

        return view('marques.edit')->with('marques', $marques);
    }

    /**
     * Update the specified Marques in storage.
     *
     * @param  int              $id
     * @param UpdateMarquesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarquesRequest $request)
    {
        $marques = $this->marquesRepository->find($id);

        if (empty($marques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marques.singular')]));

            return redirect(route('marques.index'));
        }

        $marques = $this->marquesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/marques.singular')]));

        return redirect(route('marques.index'));
    }

    /**
     * Remove the specified Marques from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marques = $this->marquesRepository->find($id);

        if (empty($marques)) {
            Flash::error(__('messages.not_found', ['model' => __('models/marques.singular')]));

            return redirect(route('marques.index'));
        }

        $this->marquesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/marques.singular')]));

        return redirect(route('marques.index'));
    }
}
