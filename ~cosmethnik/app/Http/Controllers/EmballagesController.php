<?php

namespace App\Http\Controllers;

use App\DataTables\EmballagesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmballagesRequest;
use App\Http\Requests\UpdateEmballagesRequest;
use App\Repositories\EmballagesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class EmballagesController extends AppBaseController
{
    /** @var  EmballagesRepository */
    private $emballagesRepository;

    public function __construct(EmballagesRepository $emballagesRepo)
    {
        $this->emballagesRepository = $emballagesRepo;
    }

    /**
     * Display a listing of the Emballages.
     *
     * @param EmballagesDataTable $emballagesDataTable
     * @return Response
     */
    public function index(EmballagesDataTable $emballagesDataTable)
    {
        return $emballagesDataTable->render('emballages.index');
    }

    /**
     * Show the form for creating a new Emballages.
     *
     * @return Response
     */
    public function create()
    {
        return view('emballages.create');
    }

    /**
     * Store a newly created Emballages in storage.
     *
     * @param CreateEmballagesRequest $request
     *
     * @return Response
     */
    public function store(CreateEmballagesRequest $request)
    {
        $input = $request->all();

        $emballages = $this->emballagesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/emballages.singular')]));

        return redirect(route('emballages.index'));
    }

    /**
     * Display the specified Emballages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        return view('emballages.show')->with('emballages', $emballages);
    }

    /**
     * Show the form for editing the specified Emballages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        return view('emballages.edit')->with('emballages', $emballages);
    }

    /**
     * Update the specified Emballages in storage.
     *
     * @param  int              $id
     * @param UpdateEmballagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmballagesRequest $request)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        $emballages = $this->emballagesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/emballages.singular')]));

        return redirect(route('emballages.index'));
    }

    /**
     * Remove the specified Emballages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emballages = $this->emballagesRepository->find($id);

        if (empty($emballages)) {
            Flash::error(__('messages.not_found', ['model' => __('models/emballages.singular')]));

            return redirect(route('emballages.index'));
        }

        $this->emballagesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/emballages.singular')]));

        return redirect(route('emballages.index'));
    }
}
