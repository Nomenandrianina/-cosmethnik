<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/allergenes.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/allergenes.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Legale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_legale', __('models/allergenes.fields.libelle_legale').':') !!}
    {!! Form::text('libelle_legale', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/allergenes.fields.type').':') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Allergene Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_allergene', __('models/allergenes.fields.code_allergene').':') !!}
    {!! Form::text('code_allergene', null, ['class' => 'form-control']) !!}
</div>

<!-- Seuil Reglementaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seuil_reglementaire', __('models/allergenes.fields.seuil_reglementaire').':') !!}
    {!! Form::text('seuil_reglementaire', null, ['class' => 'form-control']) !!}
</div>

<!-- Allergene Enfant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allergene_enfant', __('models/allergenes.fields.allergene_enfant').':') !!}
    {!! Form::text('allergene_enfant', null, ['class' => 'form-control']) !!}
</div>