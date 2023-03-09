<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/commentaires.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/commentaires.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/commentaires.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>