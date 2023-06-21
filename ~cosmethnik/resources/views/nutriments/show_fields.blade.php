<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/nutriments.fields.id').':') !!}
    <p>{{ $nutriments->id }}</p>
</div>

<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', __('models/nutriments.fields.nom').':') !!}
    <p>{{ $nutriments->nom }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', __('models/nutriments.fields.created_at').':') !!}
    <p>{{ $nutriments->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', __('models/nutriments.fields.updated_at').':') !!}
    <p>{{ $nutriments->updated_at }}</p>
</div>

