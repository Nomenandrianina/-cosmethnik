<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/fichiers.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/fichiers.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Chemin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chemin', __('models/fichiers.fields.chemin').':') !!}
    {!! Form::text('chemin', null, ['class' => 'form-control']) !!}
</div>

<!-- Extension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extension', __('models/fichiers.fields.extension').':') !!}
    {!! Form::text('extension', null, ['class' => 'form-control']) !!}
</div>