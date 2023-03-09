<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/emballages.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Titre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', __('models/emballages.fields.titre').':') !!}
    {!! Form::text('titre', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/emballages.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite', __('models/emballages.fields.unite').':') !!}
    {!! Form::text('unite', null, ['class' => 'form-control']) !!}
</div>