<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/physicoChimiques.fields.id').':') !!}
    <p>{{ $physicoChimiques->id }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/physicoChimiques.fields.nom').':') !!}
    <p>{{ $physicoChimiques->nom }}</p>
</div>

<!-- Unite Field -->
<div class="col-sm-12">
    {!! Form::label('unite', __('models/physicoChimiques.fields.unite').':') !!}
    <p>{{ $physicoChimiques->unite }}</p>
</div>

