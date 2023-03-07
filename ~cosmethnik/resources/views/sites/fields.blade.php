<!-- User Id Field -->
@if (isset($users))
    <div class="form-group col-sm-6">
        {!! Form::label('user_id', 'Membre:') !!}
        {!! Form::select('user_id', $users,null, ['class' => 'form-control']) !!}
    </div>
    <!-- Type Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('type', __('models/sites.fields.type').':') !!}
        {!! Form::select('type', array('Site Collaboratif' => 'Site Collaboratif', 'Site Produit' => 'Site Produit'), 'Site Collaboratif',['class' => 'form-control']) !!}
    </div>

    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/sites.fields.nom').':',['class' => 'required']) !!}
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
    </div>
@endif
@if (isset($sites->user))
    <div class="form-group col-sm-6">
        {!! Form::label('user_id', 'Membre:') !!}
        {!! Form::text('user_id', $sites->user['name'], ['disabled' => 'disabled','class' => 'form-control']) !!}
    </div>
    <!-- Type Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('type', __('models/sites.fields.type').':') !!}
        {!! Form::select('type', array('Site Collaboratif' => 'Site Collaboratif', 'Site Produit' => 'Site Produit'), 'Site Collaboratif',['class' => 'form-control']) !!}
    </div>

    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/sites.fields.nom').':',['class' => 'required']) !!}
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
    </div>
@endif


