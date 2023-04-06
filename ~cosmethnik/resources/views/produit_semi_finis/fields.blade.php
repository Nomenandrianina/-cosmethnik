<div class="row">
    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/produitSemiFinis.fields.nom').':',['class' => 'required']) !!}
        {!! Form::text('nom', null, ['class' => 'form-control','placeholder'=>'Désignation','id' => 'nom_semi_fini']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="nomError"></span>')) !!}

    </div>

    <!-- Libelle Commerciale Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('libelle_commerciale', __('models/produitSemiFinis.fields.libelle_commerciale').':',['class' => 'required']) !!}
        {!! Form::text('libelle_commerciale', null, ['class' => 'form-control','placeholder'=>'libellé commerciale','id'=> 'lib_com_semi_fini']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="libelle_commercialeError"></span>')) !!}
    </div>
</div>

<div class="row">
    <!-- Libelle Legale Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('famille', 'Famille:') !!}
        {!! Form::select('famille', $famille,null, ['class' => 'form-control','id'=>'famille_semi_fini']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sous_famille', 'Sous Famille:') !!}
        {!! Form::select('sous_famille',[],null, ['class' => 'form-control','id'=>'sous_famille_semi_fini']) !!}
    </div>
</div>


<div class="row">
    <!-- Code Bcepg Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_bcepg', __('models/produitSemiFinis.fields.code_bcepg').':',['class' => 'required']) !!}
        {!! Form::text('code_bcepg', null, ['class' => 'form-control','placeholder'=>'Code Bcepg','id'=>'code_bcepg_semi_fini']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="code_bcepgError"></span>')) !!}
    </div>

    <!-- Code Erp Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_erp', __('models/produitSemiFinis.fields.code_erp').':',['class' => 'required']) !!}
        {!! Form::text('code_erp', null, ['class' => 'form-control','placeholder'=>'Codeerp','id'=>'code_erp_semi_fini']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="code_erpError"></span>')) !!}
    </div>
</div>

<!-- Ean Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('ean', __('models/produitSemiFinis.fields.ean').':') !!}
    {!! Form::text('ean', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Ean Colis Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('ean_colis', __('models/produitSemiFinis.fields.ean_colis').':') !!}
    {!! Form::text('ean_colis', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Ean Palette Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('ean_palette', __('models/produitSemiFinis.fields.ean_palette').':') !!}
    {!! Form::text('ean_palette', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Dossier Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('dossier_id', __('models/produitSemiFinis.fields.dossier_id').':') !!}
    {!! Form::text('dossier_id', null, ['class' => 'form-control']) !!}
</div>  --}}

<div class="row">

    <!-- Etat Produit Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('etat_produit_id', __('models/produitSemiFinis.fields.etat_produit_id').':') !!}
        {!! Form::select('etat_produit_id', $etat_prod,null, ['class' => 'form-control','id'=>'etat_produit_id_semi_fini']) !!}
    </div>

    <!-- Etat Produit Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('etat_produit_id', 'Modele:') !!}
        {!! Form::select('modele', $famille,null, ['class' => 'form-control','id'=>'modele_semi_fini']) !!}
    </div>
</div>

{!! Form::hidden('sites_id',$site_texte[0]->id) !!}

{!! Form::hidden('dossier_id',$id) !!}

{{--  <input type="hidden" name="dossier_id" id="dossier_id" value="{{ $id }}">  --}}

<div class="row">
    <!-- Usine Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('usine_id', __('models/produitSemiFinis.fields.usine_id').':') !!}
        {!! Form::select('usine_id', $usines,null, ['class' => 'form-control','icon' => '<i class="fas fa-globe-europe"></i>','id'=>'usine_id_semi_fini']) !!}
    </div>

    <!-- Geographique Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('geographique_id', __('models/produitSemiFinis.fields.geographique_id').':') !!}
        {!! Form::select('geographique_id', $origines_geo,null, ['class' => 'form-control','icon' => '<i class="fas fa-globe-europe"></i>','id'=>'geographique_id_semi_fini']) !!}
    </div>
</div>

<div class="row">
    <!-- Libelle Legale Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('libelle_legale', __('models/produitSemiFinis.fields.libelle_legale').':',['class' => 'required']) !!}
        {!! Form::text('libelle_legale', null, ['class' => 'form-control','placeholder'=>'libellé legale',,'id'=> 'lib_leg_semi_fini']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="libelle_legaleError"></span>')) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/produitSemiFinis.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','rows' => 3,'placeholder'=>'Déscription','id'=>'description_semi_fini']) !!}
    {!! Html::decode(Form::label('name','<span class="text-danger" id="descriptionError"></span>')) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#ddm_dua').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
