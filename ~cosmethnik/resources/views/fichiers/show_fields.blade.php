<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/fichiers.fields.id').':') !!}
    <p>{{ $fichiers->id }}</p>
</div>

<!-- Model Type Field -->
<div class="col-sm-12">
    {!! Form::label('model_type', __('models/fichiers.fields.model_type').':') !!}
    <p>{{ $fichiers->model_type }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', __('models/fichiers.fields.model_id').':') !!}
    <p>{{ $fichiers->model_id }}</p>
</div>

<!-- Chemin Field -->
<div class="col-sm-12">
    {!! Form::label('chemin', __('models/fichiers.fields.chemin').':') !!}
    <p>{{ $fichiers->chemin }}</p>
</div>

<!-- Extension Field -->
<div class="col-sm-12">
    {!! Form::label('extension', __('models/fichiers.fields.extension').':') !!}
    <p>{{ $fichiers->extension }}</p>
</div>

