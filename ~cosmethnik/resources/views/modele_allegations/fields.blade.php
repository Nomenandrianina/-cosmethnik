<!-- Allegation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allegation', __('models/modeleAllegations.fields.allegation').':') !!}
    {!! Form::text('allegation', null, ['class' => 'form-control']) !!}
</div>

<!-- Revendique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('revendique', __('models/modeleAllegations.fields.revendique').':') !!}
    {!! Form::text('revendique', null, ['class' => 'form-control']) !!}
</div>

<!-- Information Field -->
<div class="form-group col-sm-6">
    {!! Form::label('information', __('models/modeleAllegations.fields.information').':') !!}
    {!! Form::text('information', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Certification Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_certification', __('models/modeleAllegations.fields.date_certification').':') !!}
    {!! Form::text('date_certification', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/modeleAllegations.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/modeleAllegations.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Allegation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allegation_id', __('models/modeleAllegations.fields.allegation_id').':') !!}
    {!! Form::text('allegation_id', null, ['class' => 'form-control']) !!}
</div>