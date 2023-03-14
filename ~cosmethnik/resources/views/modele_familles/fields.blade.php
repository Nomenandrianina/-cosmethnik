<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/modeleFamilles.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/modeleFamilles.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Famille Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('famille_id', __('models/modeleFamilles.fields.famille_id').':') !!}
    {!! Form::text('famille_id', null, ['class' => 'form-control']) !!}
</div>