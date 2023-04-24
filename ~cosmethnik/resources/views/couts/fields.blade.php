<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/couts.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control'.( $errors->has('nom') ? ' is-invalid' : '' ),'placeholder'=>'Désignation']) !!}
    @if($errors->has('nom'))
        <span class="text-danger">{{ $errors->first('nom') }}</span>
    @endif
</div>

<!-- Valeur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valeur', __('models/couts.fields.valeur').':') !!}
    {!! Form::text('valeur', null, ['class' => 'form-control'.( $errors->has('valeur') ? ' is-invalid' : '' ),'placeholder'=>'Valeur']) !!}
    @if($errors->has('valeur'))
        <span class="text-danger">{{ $errors->first('valeur') }}</span>
    @endif
</div>

<!-- Unite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite', __('models/couts.fields.unite').':') !!}
    {!! Form::text('unite', null, ['class' => 'form-control'.( $errors->has('unite') ? ' is-invalid' : '' ),'placeholder'=>'unite']) !!}
    @if($errors->has('unite'))
        <span class="text-danger">{{ $errors->first('unite') }}</span>
    @endif
</div>

<!-- Valeur1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valeur1', __('models/couts.fields.valeur1').':') !!}
    {!! Form::text('valeur1', null, ['class' => 'form-control']) !!}
</div>

<!-- Valeur2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valeur2', __('models/couts.fields.valeur2').':') !!}
    {!! Form::text('valeur2', null, ['class' => 'form-control']) !!}
</div>

<!-- Euv Field -->
<div class="form-group col-sm-6">
    {!! Form::label('euv', __('models/couts.fields.euv').':') !!}
    {!! Form::text('euv', null, ['class' => 'form-control']) !!}
</div>

<!-- Manuel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('manuel', __('models/couts.fields.manuel').':') !!}
    {!! Form::text('manuel', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_type', __('models/couts.fields.model_type').':') !!}
    {!! Form::text('model_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Model Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('model_id', __('models/couts.fields.model_id').':') !!}
    {!! Form::text('model_id', null, ['class' => 'form-control']) !!}
</div>
