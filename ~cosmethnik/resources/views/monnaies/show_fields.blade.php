<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/monnaies.fields.id').':') !!}
    <p>{{ $monnaies->id }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/monnaies.fields.description').':') !!}
    <p>{{ $monnaies->description }}</p>
</div>

