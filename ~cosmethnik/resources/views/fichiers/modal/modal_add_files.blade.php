<div class="modal fade" id="file-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-elements">
        @include('adminlte-templates::common.errors')

        <div class="modal-content modal-content-all">
            <div class="modal-header modal-head-color">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Ajouter un nouveau fichier</h4>
            </div>

            <div class="modal-body">
                <div class="success-msg" style="display:none" id="message_success">
                    <i class="fa fa-check"></i>
                    Insertion réussie!
                </div>
                @include('ressources.fields')
            </div>
            <div class="modal-footer">
                <div class="loading-produit-semi-fini" style="text-align:center" >
                    <div id="loading" class="lds-dual-ring"></div>
                </div>
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary','onclick'=>'Store_file();']) !!}
                <button id="file_close" class="btn btn-default">
                    @lang('crud.cancel')
                </button>

            </div>
            {{--  {!! Form::close() !!}  --}}
        </div>
    </div>
</div>

