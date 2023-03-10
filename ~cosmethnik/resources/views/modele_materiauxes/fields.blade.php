<!-- Modele Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modele_type', __('models/modeleMateriauxes.fields.modele_type').':') !!}
    {!! Form::text('modele_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Modele Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modele_id', __('models/modeleMateriauxes.fields.modele_id').':') !!}
    {!! Form::text('modele_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Poids Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poids', __('models/modeleMateriauxes.fields.poids').':') !!}
    {!! Form::text('poids', null, ['class' => 'form-control']) !!}
</div>

<!-- Materiaux Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('materiaux_id', __('models/modeleMateriauxes.fields.materiaux_id').':') !!}
    {!! Form::text('materiaux_id', null, ['class' => 'form-control']) !!}
</div>