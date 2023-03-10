<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/ingredients.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Origine Geographique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origine_geographique', __('models/ingredients.fields.origine_geographique').':') !!}
    {!! Form::text('origine_geographique', null, ['class' => 'form-control']) !!}
</div>

<!-- Pays Transformation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pays_transformation', __('models/ingredients.fields.pays_transformation').':') !!}
    {!! Form::text('pays_transformation', null, ['class' => 'form-control']) !!}
</div>

<!-- Origine Biologique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origine_biologique', __('models/ingredients.fields.origine_biologique').':') !!}
    {!! Form::text('origine_biologique', null, ['class' => 'form-control']) !!}
</div>