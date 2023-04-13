<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/pays.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' ),'placeholder'=>'Pays'  ]) !!}
    @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
</div>
