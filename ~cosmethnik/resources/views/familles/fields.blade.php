<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/familles.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent  Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent__id', __('models/familles.fields.parent__id').':') !!}
    {!! Form::text('parent__id', null, ['class' => 'form-control']) !!}
</div>

