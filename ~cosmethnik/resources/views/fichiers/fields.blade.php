<div class="form-group col-sm-6">
    {!! Form::label('chemin', __('models/fichiers.fields.chemin').':') !!}
    {!! Form::text('chemin', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('file_upload', __('models/fileUploads.fields.file_upload').':') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('file_upload', ['class' => 'custom-file-input']) !!}
            {!! Form::label('file_upload', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>

<!-- Extension Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extension', __('models/fichiers.fields.extension').':') !!}
    {!! Form::text('extension', null, ['class' => 'form-control']) !!}
</div>
