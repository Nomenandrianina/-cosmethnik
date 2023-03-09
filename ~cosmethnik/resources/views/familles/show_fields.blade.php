<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/familles.fields.id').':') !!}
    <p>{{ $famille->id }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/familles.fields.nom').':') !!}
    <p>{{ $famille->nom }}</p>
</div>

<!-- Parent  Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent__id', __('models/familles.fields.parent__id').':') !!}
    <p>{{ $famille->parent__id }}</p>
</div>

<!-- Model Type Field -->
<div class="col-sm-12">
    {!! Form::label('model_type', __('models/familles.fields.model_type').':') !!}
    <p>{{ $famille->model_type }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', __('models/familles.fields.model_id').':') !!}
    <p>{{ $famille->model_id }}</p>
</div>

