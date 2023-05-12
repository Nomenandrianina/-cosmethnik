<div class="row">
    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/emballages.fields.nom').':') !!}
        {!! Form::text('nom', null, ['class' => 'form-control','id' => 'nom_emb','placeholder'=>'Désignation']) !!}
        {!! Html::decode(Form::label('nom','<span class="text-danger" id="nomErrorEmb"></span>')) !!}
    </div>
    {!! Form::hidden('sites_id',$site_texte[0]->id) !!}
     <!-- Unite Field -->
     <div class="form-group col-sm-6">
        {!! Form::label('unite', __('models/emballages.fields.unite').':') !!}
        <select name="unite" id="unite_emb" class= "form-control">
            @foreach ( $unite as $item)
                <option value="{{ $item->id }}">{{ $item->description }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <!-- Titre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('titre', __('models/emballages.fields.titre').':') !!}
        {!! Form::textarea('titre', null, ['class' => 'form-control','rows'=>2,'id' => 'titre_emb']) !!}
    </div>
    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('description', __('models/emballages.fields.description').':') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','rows'=>2,'id' => 'description_emb']) !!}
    </div>
</div>


