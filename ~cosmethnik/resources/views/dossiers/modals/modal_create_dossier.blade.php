<div class="modal fade" id="dossier-modal" tabindex="-1" aria-labelledby="examplemodalsLabel" aria-hidden="true">
     {!! Form::open(['route' => 'dossiers.store']) !!}
    <div class="modal-dialog modal-elements">
      <div class="modal-content">
        <div class="modal-header modal-head-color">
          <h2 class="modal-title fs-5" id="examplemodalsLabel">Créer un nouveau dossier</h2>
        </div>
        <div class="modal-body">
          @include('dossiers.fields')
        </div>
        <div class="modal-footer">
            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
            <a id="dossier_close" class="btn btn-default">
             @lang('crud.cancel')
            </a>
        </div>
      </div>
    </div>
     {!! Form::close() !!}
</div>
