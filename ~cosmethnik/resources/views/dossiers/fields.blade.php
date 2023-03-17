<!-- Name Field -->

@if (isset($dossiers))
    <div class="form-group col-sm-6">
        {!! Form::label('name', __('models/dossiers.fields.name').':',['class' => 'required']) !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', __('models/dossiers.fields.title').':',['class' => 'required']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group col-sm-6">
        {!! Form::label('sites_id', 'Site:',['class' => 'required']) !!}
        {!! Form::text('sites_id', $dossiers->site['nom'], ['disabled'=> 'disabled','class' => 'form-control']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('description', __('models/dossiers.fields.description').':') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3]) !!}
    </div>
@else
    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('name', __('models/dossiers.fields.name').':',['class' => 'required']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Title Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('title', __('models/dossiers.fields.title').':',['class' => 'required']) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6">
            {!! Form::label('sites_id', 'Site:',['class' => 'required']) !!}
            {!! Form::select('sites_id', $sites,null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('Category', 'Categories:') !!}
            {!! Form::select('parent_id',$allDoc ,null, ['class' => 'form-control']) !!}
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

