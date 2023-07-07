<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<div class="modal fade" id="site-members-modal" tabindex="-1" aria-labelledby="examplemodalsLabel" aria-hidden="true">
    <div class="modal-dialog modal-elements">
      <div class="modal-content">
        <div class="modal-header modal-head-color">
          <h2 class="modal-title fs-5" id="examplemodalsLabel">Ajouter un membre</h2>
        </div>
        <div class="modal-body">
            <div class="form-group col-sm-9">
                {!! Form::label('user_id', 'Membre:') !!}
                <select class="form-control" id="user_id" name="user_id" multiple data-live-search="true">
                    @foreach ($add_members as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>

            </div>
            <div class="form-group col-sm-9">
                {!! Form::label('site_id', 'Site:') !!}
                <input type="text"  value="{{ $site_texte[0]->nom }}" class="form-control" disabled>
                <input type="hidden" name="site_id" id="site_id" value="{{ $site_texte[0]->id }}" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary','onclick'=>'add_member();']) !!}
            <a id="close-site-add" class="btn btn-default">
             @lang('crud.cancel')
            </a>
        </div>
      </div>
    </div>
</div>
