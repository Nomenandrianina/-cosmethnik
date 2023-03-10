<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/allergenes.fields.id').':') !!}
    <p>{{ $allergenes->id }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/allergenes.fields.nom').':') !!}
    <p>{{ $allergenes->nom }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/allergenes.fields.description').':') !!}
    <p>{{ $allergenes->description }}</p>
</div>

<!-- Libelle Legale Field -->
<div class="col-sm-12">
    {!! Form::label('libelle_legale', __('models/allergenes.fields.libelle_legale').':') !!}
    <p>{{ $allergenes->libelle_legale }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', __('models/allergenes.fields.type').':') !!}
    <p>{{ $allergenes->type }}</p>
</div>

<!-- Code Allergene Field -->
<div class="col-sm-12">
    {!! Form::label('code_allergene', __('models/allergenes.fields.code_allergene').':') !!}
    <p>{{ $allergenes->code_allergene }}</p>
</div>

<!-- Seuil Reglementaire Field -->
<div class="col-sm-12">
    {!! Form::label('seuil_reglementaire', __('models/allergenes.fields.seuil_reglementaire').':') !!}
    <p>{{ $allergenes->seuil_reglementaire }}</p>
</div>

<!-- Allergene Enfant Field -->
<div class="col-sm-12">
    {!! Form::label('allergene_enfant', __('models/allergenes.fields.allergene_enfant').':') !!}
    <p>{{ $allergenes->allergene_enfant }}</p>
</div>

