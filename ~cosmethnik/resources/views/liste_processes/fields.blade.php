<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/listeProcesses.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/listeProcesses.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ressource Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ressource_id', __('models/listeProcesses.fields.ressource_id').':') !!}
    {!! Form::text('ressource_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite', __('models/listeProcesses.fields.quantite').':') !!}
    {!! Form::text('quantite', null, ['class' => 'form-control']) !!}
</div>

<!-- Cadence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cadence', __('models/listeProcesses.fields.cadence').':') !!}
    {!! Form::text('cadence', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Cadence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite_cadence', __('models/listeProcesses.fields.unite_cadence').':') !!}
    {!! Form::text('unite_cadence', null, ['class' => 'form-control']) !!}
</div>

<!-- Taux Horaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('taux_horaire', __('models/listeProcesses.fields.taux_horaire').':') !!}
    {!! Form::text('taux_horaire', null, ['class' => 'form-control']) !!}
</div>

<!-- Produit Heure Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produit_heure', __('models/listeProcesses.fields.produit_heure').':') !!}
    {!! Form::text('produit_heure', null, ['class' => 'form-control']) !!}
</div>