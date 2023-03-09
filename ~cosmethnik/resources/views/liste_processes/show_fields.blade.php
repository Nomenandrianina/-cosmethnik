<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/listeProcesses.fields.id').':') !!}
    <p>{{ $listeProcess->id }}</p>
</div>

<!-- Model Type Field -->
<div class="col-sm-12">
    {!! Form::label('model_type', __('models/listeProcesses.fields.model_type').':') !!}
    <p>{{ $listeProcess->model_type }}</p>
</div>

<!-- Model Id Field -->
<div class="col-sm-12">
    {!! Form::label('model_id', __('models/listeProcesses.fields.model_id').':') !!}
    <p>{{ $listeProcess->model_id }}</p>
</div>

<!-- Ressource Id Field -->
<div class="col-sm-12">
    {!! Form::label('ressource_id', __('models/listeProcesses.fields.ressource_id').':') !!}
    <p>{{ $listeProcess->ressource_id }}</p>
</div>

<!-- Quantite Field -->
<div class="col-sm-12">
    {!! Form::label('quantite', __('models/listeProcesses.fields.quantite').':') !!}
    <p>{{ $listeProcess->quantite }}</p>
</div>

<!-- Cadence Field -->
<div class="col-sm-12">
    {!! Form::label('cadence', __('models/listeProcesses.fields.cadence').':') !!}
    <p>{{ $listeProcess->cadence }}</p>
</div>

<!-- Unite Cadence Field -->
<div class="col-sm-12">
    {!! Form::label('unite_cadence', __('models/listeProcesses.fields.unite_cadence').':') !!}
    <p>{{ $listeProcess->unite_cadence }}</p>
</div>

<!-- Taux Horaire Field -->
<div class="col-sm-12">
    {!! Form::label('taux_horaire', __('models/listeProcesses.fields.taux_horaire').':') !!}
    <p>{{ $listeProcess->taux_horaire }}</p>
</div>

<!-- Produit Heure Field -->
<div class="col-sm-12">
    {!! Form::label('produit_heure', __('models/listeProcesses.fields.produit_heure').':') !!}
    <p>{{ $listeProcess->produit_heure }}</p>
</div>

