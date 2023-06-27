<!-- Name Field -->

@if (isset($dossiers))
    <div class="form-group col-sm-6">
        {!! Form::label('name', __('models/dossiers.fields.name').':',['class' => 'required']) !!}
        {!! Form::text('name', null, ['class' => 'form-control','id'=>'name']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="nameErrordossier"></span>')) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', __('models/dossiers.fields.title').':',['class' => 'required']) !!}
        {!! Form::text('title', null, ['class' => 'form-control','id'=>'title']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="titleErrordossier"></span>')) !!}

    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('sites_id', 'Site:',['class' => 'required']) !!}
        {!! Form::text('sites_id', $dossiers->site['nom'], ['disabled'=> 'disabled','class' => 'form-control','id'=>'sites_id']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="sites_idErrordossier"></span>')) !!}

    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('description', __('models/dossiers.fields.description').':') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3,'id'=>'sites_id']) !!}
    </div>
@else
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('name', __('models/dossiers.fields.name').':',['class' => 'required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! Html::decode(Form::label('name','<span class="text-danger" id="nameErrordossier"></span>')) !!}
        </div>

        <!-- Title Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('title', __('models/dossiers.fields.title').':',['class' => 'required']) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
            {!! Html::decode(Form::label('name','<span class="text-danger" id="titleErrordossier"></span>')) !!}
        </div>
    </div>



    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('sites_id', 'Site:',['class' => 'required']) !!}
            <select name="sites_id" id="sites_id" class="form-control" disabled>
                <option value="{{ $site_texte[0]['id'] }}" selected>{{ $site_texte[0]['nom'] }}</option>
              </select>
            {!! Html::decode(Form::label('name','<span class="text-danger" id="sites_idErrordossier"></span>')) !!}
        </div>


        <div class="form-group col-sm-6">
            {!! Form::label('Category', 'Categories:') !!}
            <select name="parent_id" id="parent_id" class="form-control" disabled>
                <option value="{{ $document_one->isEmpty() ? 0 : $document_one[0]['id'] }}" selected>{{ $document_one->isEmpty() ? 0 : $document_one[0]['name'] }}</option>
            </select>
        </div>
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('link', __('models/dossiers.fields.link').':') !!}
        {!! Form::text('link', null, ['class' => 'form-control link']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('description', __('models/dossiers.fields.description').':') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3]) !!}
    </div>
@endif

