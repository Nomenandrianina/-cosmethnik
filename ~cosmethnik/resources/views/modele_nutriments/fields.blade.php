<!-- Nutriment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nutriment_id', __('models/modeleNutriments.fields.nutriment_id').':') !!}
    {!! Form::number('nutriment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Valeur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valeur', __('models/modeleNutriments.fields.valeur').':') !!}
    {!! Form::number('valeur', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite', __('models/modeleNutriments.fields.unite').':') !!}
    {!! Form::text('unite', null, ['class' => 'form-control']) !!}
</div>

<!-- Mini Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mini', __('models/modeleNutriments.fields.mini').':') !!}
    {!! Form::number('mini', null, ['class' => 'form-control']) !!}
</div>

<!-- Maxi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('maxi', __('models/modeleNutriments.fields.maxi').':') !!}
    {!! Form::number('maxi', null, ['class' => 'form-control']) !!}
</div>

<!-- Portion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('portion', __('models/modeleNutriments.fields.portion').':') !!}
    {!! Form::number('portion', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Portion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite_portion', __('models/modeleNutriments.fields.unite_portion').':') !!}
    {!! Form::text('unite_portion', null, ['class' => 'form-control']) !!}
</div>

<!-- Ajr Portion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ajr_portion', __('models/modeleNutriments.fields.ajr_portion').':') !!}
    {!! Form::number('ajr_portion', null, ['class' => 'form-control']) !!}
</div>

<!-- Perte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('perte', __('models/modeleNutriments.fields.perte').':') !!}
    {!! Form::number('perte', null, ['class' => 'form-control']) !!}
</div>

<!-- Methode Field -->
<div class="form-group col-sm-6">
    {!! Form::label('methode', __('models/modeleNutriments.fields.methode').':') !!}
    {!! Form::text('methode', null, ['class' => 'form-control']) !!}
</div>