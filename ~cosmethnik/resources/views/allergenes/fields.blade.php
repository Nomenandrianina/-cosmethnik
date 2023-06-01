<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/allergenes.fields.nom').' *:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control'.( $errors->has('nom') ? ' is-invalid' : '' ),'placeholder'=>'Nom']) !!}
    @if($errors->has('nom'))
        <span class="text-danger">{{ $errors->first('nom') }}</span>
    @endif
</div>

<!-- Libelle Legale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_legale', __('models/allergenes.fields.libelle_legale').':') !!}
    {!! Form::text('libelle_legale', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/allergenes.fields.type').' *:') !!}
    {!! Form::text('type', null, ['class' => 'form-control'.( $errors->has('type') ? ' is-invalid' : '' ),'placeholder'=>'Type']) !!}
    @if($errors->has('type'))
        <span class="text-danger">{{ $errors->first('type') }}</span>
    @endif
</div>

<!-- Code Allergene Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_allergene', __('models/allergenes.fields.code_allergene').' *:') !!}
    {!! Form::text('code_allergene', null, ['class' => 'form-control'.( $errors->has('code_allergene') ? ' is-invalid' : '' ),'placeholder'=>'Code allergène']) !!}
    @if($errors->has('code_allergene'))
        <span class="text-danger">{{ $errors->first('code_allergene') }}</span>
    @endif
</div>

<!-- Seuil Reglementaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seuil_reglementaire', __('models/allergenes.fields.seuil_reglementaire').':') !!}
    {!! Form::text('seuil_reglementaire', null, ['class' => 'form-control']) !!}
</div>

<!-- Allergene Enfant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('allergene_enfant', __('models/allergenes.fields.allergene_enfant').':') !!}
    {!! Form::select('allergene_enfant',$allergenes, null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/allergenes.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' , 'rows' => 2]) !!}
</div>
