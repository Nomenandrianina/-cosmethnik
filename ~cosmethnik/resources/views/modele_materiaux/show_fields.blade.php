<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/modeleMateriaux.fields.id').':') !!}
    <p>{{ $modeleMateriaux->id }}</p>
</div>

<!-- Modele Type Field -->
<div class="col-sm-12">
    {!! Form::label('modele_type', __('models/modeleMateriaux.fields.modele_type').':') !!}
    <p>{{ $modeleMateriaux->modele_type }}</p>
</div>

<!-- Modele Id Field -->
<div class="col-sm-12">
    {!! Form::label('modele_id', __('models/modeleMateriaux.fields.modele_id').':') !!}
    <p>{{ $modeleMateriaux->modele_id }}</p>
</div>

<!-- Poids Field -->
<div class="col-sm-12">
    {!! Form::label('poids', __('models/modeleMateriaux.fields.poids').':') !!}
    <p>{{ $modeleMateriaux->poids }}</p>
</div>

<!-- Materiaux Id Field -->
<div class="col-sm-12">
    {!! Form::label('materiaux_id', __('models/modeleMateriaux.fields.materiaux_id').':') !!}
    <p>{{ $modeleMateriaux->materiaux_id }}</p>
</div>

