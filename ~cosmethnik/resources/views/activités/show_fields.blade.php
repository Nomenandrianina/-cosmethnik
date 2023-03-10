<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/activités.fields.id').':') !!}
    <p>{{ $activités->id }}</p>
</div>

<!-- Model Type Field -->
<div class="col-sm-12">
    {!! Form::label('model_type', __('models/activités.fields.model_type').':') !!}
    <p>{{ $activités->model_type }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', __('models/activités.fields.model_id').':') !!}
    <p>{{ $activités->model_id }}</p>
</div>

<!-- Action Field -->
<div class="col-sm-12">
    {!! Form::label('action', __('models/activités.fields.action').':') !!}
    <p>{{ $activités->action }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', __('models/activités.fields.user_id').':') !!}
    <p>{{ $activités->user_id }}</p>
</div>

