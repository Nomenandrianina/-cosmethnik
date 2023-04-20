<!-- Nom Field -->
<div class="form-group col-sm-5">
    {!! Form::label('nom', __('models/physicoChimiques.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' =>  'form-control ' . ( $errors->has('nom') ? ' is-invalid' : '' ),'placeholder'=>'Désignation' ]) !!}
    @if($errors->has('nom'))
        <span class="text-danger">{{ $errors->first('nom') }}</span>
    @endif
</div>

<!-- Unite Field -->
<div class="form-group col-sm-5">
    {!! Form::label('unite', __('models/physicoChimiques.fields.unite').':') !!}
    {!! Form::text('unite', null, ['class' => 'form-control'  . ( $errors->has('nom') ? ' is-invalid' : '' ),'placeholder'=>'unité' ]) !!}
    @if($errors->has('unite'))
        <span class="text-danger">{{ $errors->first('unite') }}</span>
    @endif
</div>
