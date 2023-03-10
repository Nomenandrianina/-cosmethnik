<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/activités.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/activités.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Action Field -->
<div class="form-group col-sm-6">
    {!! Form::label('action', __('models/activités.fields.action').':') !!}
    {!! Form::text('action', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/activités.fields.user_id').':') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>