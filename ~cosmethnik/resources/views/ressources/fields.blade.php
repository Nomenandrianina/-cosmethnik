<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/ressources.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Etape Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etape', __('models/ressources.fields.etape').':') !!}
    {!! Form::text('etape', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Parametre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_parametre', __('models/ressources.fields.type_parametre').':') !!}
    {!! Form::text('type_parametre', null, ['class' => 'form-control']) !!}
</div>

<!-- Parametre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parametre', __('models/ressources.fields.parametre').':') !!}
    {!! Form::text('parametre', null, ['class' => 'form-control']) !!}
</div>

<!-- Valeur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valeur', __('models/ressources.fields.valeur').':') !!}
    {!! Form::text('valeur', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite', __('models/ressources.fields.unite').':') !!}
    {!! Form::text('unite', null, ['class' => 'form-control']) !!}
</div>