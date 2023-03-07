<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/sites.fields.id').':') !!}
    <p>{{ $sites->id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/sites.fields.user_id').':') !!}
    <p>{{ $sites->user_id }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', __('models/sites.fields.type').':') !!}
    <p>{{ $sites->type }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/sites.fields.nom').':') !!}
    <p>{{ $sites->nom }}</p>
</div>

