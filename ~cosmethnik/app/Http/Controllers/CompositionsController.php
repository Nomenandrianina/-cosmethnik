<?php

namespace App\Http\Controllers;

use App\DataTables\CompositionsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCompositionsRequest;
use App\Http\Requests\UpdateCompositionsRequest;
use App\Repositories\CompositionsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CompositionsController extends AppBaseController
{
    /** @var  CompositionsRepository */
    private $compositionsRepository;

    public function __construct(CompositionsRepository $compositionsRepo)
    {
        $this->compositionsRepository = $compositionsRepo;
    }

    /**
     * Display a listing of the Compositions.
     *
     * @param CompositionsDataTable $compositionsDataTable
     * @return Response
     */
    public function index(CompositionsDataTable $compositionsDataTable)
    {
        return $compositionsDataTable->render('compositions.index');
    }

    /**
     * Show the form for creating a new Compositions.
     *
     * @return Response
     */
    public function create()
    {
        return view('compositions.create');
    }

    /**
     * Store a newly created Compositions in storage.
     *
     * @param CreateCompositionsRequest $request
     *
     * @return Response
     */
    public function store(CreateCompositionsRequest $request)
    {
        $input = $request->all();

        $compositions = $this->compositionsRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/compositions.singular')]));

        return redirect(route('compositions.index'));
    }

    /**
     * Display the specified Compositions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        return view('compositions.show')->with('compositions', $compositions);
    }

    /**
     * Show the form for editing the specified Compositions.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        return view('compositions.edit')->with('compositions', $compositions);
    }

    /**
     * Update the specified Compositions in storage.
     *
     * @param  int              $id
     * @param UpdateCompositionsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompositionsRequest $request)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        $compositions = $this->compositionsRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/compositions.singular')]));

        return redirect(route('compositions.index'));
    }

    /**
     * Remove the specified Compositions from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compositions = $this->compositionsRepository->find($id);

        if (empty($compositions)) {
            Flash::error(__('messages.not_found', ['model' => __('models/compositions.singular')]));

            return redirect(route('compositions.index'));
        }

        $this->compositionsRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/compositions.singular')]));

        return redirect(route('compositions.index'));
    }
}
