<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/commentaires.fields.id').':') !!}
    <p>{{ $commentaires->id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/commentaires.fields.description').':') !!}
    <p>{{ $commentaires->description }}</p>
</div>

<!-- Model Type Field -->
<div class="col-sm-12">
    {!! Form::label('model_type', __('models/commentaires.fields.model_type').':') !!}
    <p>{{ $commentaires->model_type }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', __('models/commentaires.fields.model_id').':') !!}
    <p>{{ $commentaires->model_id }}</p>
</div>

