<div class="modal fade" id="produit-semi-fini-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-elements">
        @include('adminlte-templates::common.errors')

        <div class="modal-content">
             {!! Form::open(['id' => 'create_produit_semi_fini','onsubmit' => 'Store_produit_semi_fini(); return false']) !!}
            <div class="modal-header modal-head-color">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Créer un nouveau produit semi finis</h4>
            </div>

            <div class="modal-body">
                <div class="success-msg" style="display:none" id="message_success">
                    <i class="fa fa-check"></i>
                    Insertion réussie!
                </div>
                @include('produit_semi_finis.fields')
            </div>
            <div class="modal-footer">
                <div class="loading-produit-semi-fini" style="text-align:center" >
                    <div id="loading" class="lds-dual-ring"></div>
                    {{--  <img src="{{asset('images/loading.gif')}}" alt="" width="150px" height="90px">  --}}
                </div>
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                <button id="produit_semi_fini_close" class="btn btn-default">
                    @lang('crud.cancel')
                </button>

            </div>
            {{--  {!! Form::close() !!}  --}}
        </div>
    </div>
</div>

