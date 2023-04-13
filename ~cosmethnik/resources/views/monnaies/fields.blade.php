<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/monnaies.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control'. ( $errors->has('description') ? ' is-invalid' : '' ),'placeholder'=>'Description']) !!}
    @if($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
</div>
