<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/ingredients.fields.id').':') !!}
    <p>{{ $ingredients->id }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/ingredients.fields.nom').':') !!}
    <p>{{ $ingredients->nom }}</p>
</div>

<!-- Origine Geographique Field -->
<div class="col-sm-12">
    {!! Form::label('origine_geographique', __('models/ingredients.fields.origine_geographique').':') !!}
    <p>{{ $ingredients->origine_geographique }}</p>
</div>

<!-- Pays Transformation Field -->
<div class="col-sm-12">
    {!! Form::label('pays_transformation', __('models/ingredients.fields.pays_transformation').':') !!}
    <p>{{ $ingredients->pays_transformation }}</p>
</div>

<!-- Origine Biologique Field -->
<div class="col-sm-12">
    {!! Form::label('origine_biologique', __('models/ingredients.fields.origine_biologique').':') !!}
    <p>{{ $ingredients->origine_biologique }}</p>
</div>

