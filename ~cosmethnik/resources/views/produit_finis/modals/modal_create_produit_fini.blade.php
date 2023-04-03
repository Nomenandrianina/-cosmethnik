<div class="modal fade" id="produit-fini-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    {!! Form::open(['id' => 'create_produit_fini']) !!}
        <div class="modal-dialog modal-elements">
            <div class="modal-content">
                <div class="modal-header modal-head-color">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Créer un nouveau produit fini</h4>
                </div>
                <div class="modal-body">
                    @include('produit_finis.fields')
                </div>
                <div class="modal-footer">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                    <a id="produit_fini_close" class="btn btn-default">
                    @lang('crud.cancel')
                    </a>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
</div>
