<?php

namespace App\Http\Controllers;

use App\DataTables\CommentairesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCommentairesRequest;
use App\Http\Requests\UpdateCommentairesRequest;
use App\Repositories\CommentairesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CommentairesController extends AppBaseController
{
    /** @var  CommentairesRepository */
    private $commentairesRepository;

    public function __construct(CommentairesRepository $commentairesRepo)
    {
        $this->commentairesRepository = $commentairesRepo;
    }

    /**
     * Display a listing of the Commentaires.
     *
     * @param CommentairesDataTable $commentairesDataTable
     * @return Response
     */
    public function index(CommentairesDataTable $commentairesDataTable)
    {
        return $commentairesDataTable->render('commentaires.index');
    }

    /**
     * Show the form for creating a new Commentaires.
     *
     * @return Response
     */
    public function create()
    {
        return view('commentaires.create');
    }

    /**
     * Store a newly created Commentaires in storage.
     *
     * @param CreateCommentairesRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentairesRequest $request)
    {
        $input = $request->all();

        $commentaires = $this->commentairesRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/commentaires.singular')]));

        return redirect(route('commentaires.index'));
    }

    /**
     * Display the specified Commentaires.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $commentaires = $this->commentairesRepository->find($id);

        if (empty($commentaires)) {
            Flash::error(__('messages.not_found', ['model' => __('models/commentaires.singular')]));

            return redirect(route('commentaires.index'));
        }

        return view('commentaires.show')->with('commentaires', $commentaires);
    }

    /**
     * Show the form for editing the specified Commentaires.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $commentaires = $this->commentairesRepository->find($id);

        if (empty($commentaires)) {
            Flash::error(__('messages.not_found', ['model' => __('models/commentaires.singular')]));

            return redirect(route('commentaires.index'));
        }

        return view('commentaires.edit')->with('commentaires', $commentaires);
    }

    /**
     * Update the specified Commentaires in storage.
     *
     * @param  int              $id
     * @param UpdateCommentairesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommentairesRequest $request)
    {
        $commentaires = $this->commentairesRepository->find($id);

        if (empty($commentaires)) {
            Flash::error(__('messages.not_found', ['model' => __('models/commentaires.singular')]));

            return redirect(route('commentaires.index'));
        }

        $commentaires = $this->commentairesRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/commentaires.singular')]));

        return redirect(route('commentaires.index'));
    }

    /**
     * Remove the specified Commentaires from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $commentaires = $this->commentairesRepository->find($id);

        if (empty($commentaires)) {
            Flash::error(__('messages.not_found', ['model' => __('models/commentaires.singular')]));

            return redirect(route('commentaires.index'));
        }

        $this->commentairesRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/commentaires.singular')]));

        return redirect(route('commentaires.index'));
    }
}
