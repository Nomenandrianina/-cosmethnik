<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/casEmploies.fields.id').':') !!}
    <p>{{ $casEmploies->id }}</p>
</div>

<!-- Model Type Field -->
<div class="col-sm-12">
    {!! Form::label('model_type', __('models/casEmploies.fields.model_type').':') !!}
    <p>{{ $casEmploies->model_type }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', __('models/casEmploies.fields.model_id').':') !!}
    <p>{{ $casEmploies->model_id }}</p>
</div>

