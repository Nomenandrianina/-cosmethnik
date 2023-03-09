<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/emballages.fields.id').':') !!}
    <p>{{ $emballages->id }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/emballages.fields.nom').':') !!}
    <p>{{ $emballages->nom }}</p>
</div>

<!-- Titre Field -->
<div class="col-sm-12">
    {!! Form::label('titre', __('models/emballages.fields.titre').':') !!}
    <p>{{ $emballages->titre }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/emballages.fields.description').':') !!}
    <p>{{ $emballages->description }}</p>
</div>

<!-- Unite Field -->
<div class="col-sm-12">
    {!! Form::label('unite', __('models/emballages.fields.unite').':') !!}
    <p>{{ $emballages->unite }}</p>
</div>

