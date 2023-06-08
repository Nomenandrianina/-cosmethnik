<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/couts.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control'.( $errors->has('nom') ? ' is-invalid' : '' ),'placeholder'=>'Désignation']) !!}
    @if($errors->has('nom'))
        <span class="text-danger">{{ $errors->first('nom') }}</span>
    @endif
</div>
