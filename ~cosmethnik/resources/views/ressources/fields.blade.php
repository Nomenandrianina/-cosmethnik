<div class="row">
    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/ressources.fields.nom').' (*):') !!}
        {!! Form::text('nom', null, ['class' => 'form-control','id' => 'nom_ressource']) !!}
        {!! Html::decode(Form::label('nom','<span class="text-danger" id="nomErrorRessource"></span>')) !!}
    </div>

    <!-- Etape Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('titre', __('models/ressources.fields.titre').':') !!}
        {!! Form::text('titre', null, ['class' => 'form-control','id' => 'titre_ressource']) !!}
    </div>
</div>

{!! Form::hidden('sites_id',$site_texte[0]->id) !!}

<div class="row">
    <!-- Type Parametre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('libelle_legale', __('models/ressources.fields.libelle_legal').' (*):') !!}
        {!! Form::text('libelle_legale', null, ['class' => 'form-control','id' => 'libelle_legale_ressource']) !!}
        {!! Html::decode(Form::label('libelle_legale','<span class="text-danger" id="libelle_legaleErrorRessource"></span>')) !!}
    </div>

    <!-- Parametre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('description', __('models/ressources.fields.description').':') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'description_ressource','rows' => 2]) !!}
    </div>
</div>

<div class="row">
    <!-- Valeur Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('commentaires', __('models/ressources.fields.commentaires').':') !!}
        {!! Form::textarea('commentaires', null, ['class' => 'form-control','rows' => 2,'id' => 'commentaires_ressource']) !!}
    </div>

    <!-- Unite Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('famille', __('models/ressources.fields.famille').':') !!}
        {!! Form::select('famille', $famille,null, ['class' => 'form-control','id' => 'famille_ressource']) !!}
    </div>
</div>

<div class="row">
    <!-- Valeur Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sous_famille', __('models/ressources.fields.sous_famille').':') !!}
        {!! Form::select('sous_famille', [],null, ['class' => 'form-control','id' => 'sous_famille_ressource']) !!}
    </div>

    <!-- Unite Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('etat_produit', __('models/ressources.fields.etat_produit').':') !!}
        {!! Form::select('etat_produit', $etat_prod,null, ['class' => 'form-control','id' => 'etat_produit_ressource']) !!}
    </div>
</div>

<div class="row">
    <!-- Valeur Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('unite', __('models/ressources.fields.unite').':') !!}
        <select name="unite" class= "form-control" id="unite_ressource">
            @foreach ( $unite as $item)
                <option value="{{ $item->id }}">{{ $item->description }}</option>
            @endforeach
        </select>
    </div>

    <!-- Unite Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_becpg', __('models/ressources.fields.code_becpg').' (*):') !!}
        {!! Form::text('code_becpg', null, ['class' => 'form-control','id' => 'code_becpg_ressource']) !!}
        {!! Html::decode(Form::label('code_becpg','<span class="text-danger" id="code_bcepgErrorRessource"></span>')) !!}
    </div>
</div>

<div class="row">
    <!-- Valeur Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_erp', __('models/ressources.fields.code_erp').' (*):') !!}
        {!! Form::text('code_erp',null, ['class' => 'form-control','id' => 'code_erp_ressource']) !!}
        {!! Html::decode(Form::label('code_erp','<span class="text-danger" id="code_erpErrorRessource"></span>')) !!}
    </div>

    <!-- Unite Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ean', __('models/ressources.fields.ean').':') !!}
        {!! Form::text('ean', null, ['class' => 'form-control','id' => 'ean_ressource']) !!}
    </div>
</div>

<div class="row">
    <!-- Valeur Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('modele', __('models/ressources.fields.modele').':') !!}
        {!! Form::select('modele', $ressource,null, ['class' => 'form-control','id' => 'modele_ressource']) !!}
    </div>
</div>

