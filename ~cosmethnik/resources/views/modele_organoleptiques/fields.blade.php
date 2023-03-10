<!-- Caractéristique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('caractéristique', __('models/modeleOrganoleptiques.fields.caractéristique').':') !!}
    {!! Form::text('caractéristique', null, ['class' => 'form-control']) !!}
</div>

<!-- Valeur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valeur', __('models/modeleOrganoleptiques.fields.valeur').':') !!}
    {!! Form::text('valeur', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/modeleOrganoleptiques.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/modeleOrganoleptiques.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Organoleptique Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organoleptique_id', __('models/modeleOrganoleptiques.fields.organoleptique_id').':') !!}
    {!! Form::text('organoleptique_id', null, ['class' => 'form-control']) !!}
</div>