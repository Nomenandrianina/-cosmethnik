<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/dossiers.fields.id').':') !!}
    <p>{{ $dossiers->id }}</p>
</div>

<!-- Sites Id Field -->
<div class="col-sm-12">
    {!! Form::label('sites_id', __('models/dossiers.fields.sites_id').':') !!}
    <p>{{ $dossiers->sites_id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/dossiers.fields.name').':') !!}
    <p>{{ $dossiers->name }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/dossiers.fields.title').':') !!}
    <p>{{ $dossiers->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/dossiers.fields.description').':') !!}
    <p>{{ $dossiers->description }}</p>
</div>

