<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/ressources.fields.id').':') !!}
    <p>{{ $ressources->id }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/ressources.fields.nom').':') !!}
    <p>{{ $ressources->nom }}</p>
</div>

<!-- Etape Field -->
<div class="col-sm-12">
    {!! Form::label('etape', __('models/ressources.fields.etape').':') !!}
    <p>{{ $ressources->etape }}</p>
</div>

<!-- Type Parametre Field -->
<div class="col-sm-12">
    {!! Form::label('type_parametre', __('models/ressources.fields.type_parametre').':') !!}
    <p>{{ $ressources->type_parametre }}</p>
</div>

<!-- Parametre Field -->
<div class="col-sm-12">
    {!! Form::label('parametre', __('models/ressources.fields.parametre').':') !!}
    <p>{{ $ressources->parametre }}</p>
</div>

<!-- Valeur Field -->
<div class="col-sm-12">
    {!! Form::label('valeur', __('models/ressources.fields.valeur').':') !!}
    <p>{{ $ressources->valeur }}</p>
</div>

<!-- Unite Field -->
<div class="col-sm-12">
    {!! Form::label('unite', __('models/ressources.fields.unite').':') !!}
    <p>{{ $ressources->unite }}</p>
</div>

