<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/ingredients.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control'. ( $errors->has('nom') ? ' is-invalid' : '' ),'placeholder'=>'Nom']) !!}
    @if($errors->has('nom'))
        <span class="text-danger">{{ $errors->first('nom') }}</span>
    @endif
</div>

<!-- Origine Geographique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origine_geographique', __('models/ingredients.fields.origine_geographique').':') !!}
    {!! Form::select('origine_geographique', $origines_geo,null, ['class' => 'form-control']) !!}
</div>

<!-- Pays Transformation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pays_transformation', __('models/ingredients.fields.pays_transformation').':') !!}
    {!! Form::select('pays_transformation',  $origines_geo,null, ['class' => 'form-control']) !!}
</div>

<!-- Origine Biologique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origine_biologique', __('models/ingredients.fields.origine_biologique').':') !!}
    {!! Form::text('origine_biologique', null, ['class' => 'form-control'. ( $errors->has('origine_biologique') ? ' is-invalid' : '' ),"placeholder"=>"Origine biologique"]) !!}
    @if($errors->has('origine_biologique'))
        <span class="text-danger">{{ $errors->first('origine_biologique') }}</span>
    @endif
</div>
