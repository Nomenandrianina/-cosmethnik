<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/physicoChimiques.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite', __('models/physicoChimiques.fields.unite').':') !!}
    {!! Form::text('unite', null, ['class' => 'form-control']) !!}
</div>