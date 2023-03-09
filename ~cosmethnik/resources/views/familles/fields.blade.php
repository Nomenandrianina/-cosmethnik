<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/familles.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent  Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent__id', __('models/familles.fields.parent__id').':') !!}
    {!! Form::text('parent__id', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/familles.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/familles.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>