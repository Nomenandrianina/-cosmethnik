<div class="row">
    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/produitSemiFinis.fields.nom').':') !!}
        {!! Form::text('nom', null, ['class' => 'form-control','placeholder'=>'Désignation','id' => 'nom_semi_fini']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="nomError"></span>')) !!}

    </div>

    <!-- Libelle Commerciale Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('libelle_commerciale', __('models/produitSemiFinis.fields.libelle_commerciale').':') !!}
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
        {!! Form::label('code_bcepg', __('models/produitSemiFinis.fields.code_bcepg').':') !!}
        {!! Form::text('code_bcepg', null, ['class' => 'form-control','placeholder'=>'Code Bcepg','id'=>'code_bcepg_semi_fini']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="code_bcepgError"></span>')) !!}
    </div>

    <!-- Code Erp Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_erp', __('models/produitSemiFinis.fields.code_erp').':') !!}
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

<!-- Filiale Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('filiale_id', __('models/produitSemiFinis.fields.filiale_id').':') !!}
    {!! Form::text('filiale_id', null, ['class' => 'form-control']) !!}
</div>  --}}
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
        {!! Form::label('libelle_legale', __('models/produitSemiFinis.fields.libelle_legale').':') !!}
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

<!-- Marque Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('marque_id', __('models/produitSemiFinis.fields.marque_id').':') !!}
    {!! Form::text('marque_id', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Client Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('client_id', __('models/produitSemiFinis.fields.client_id').':') !!}
    {!! Form::text('client_id', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Unite Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('unite_id', __('models/produitSemiFinis.fields.unite_id').':') !!}
    {!! Form::text('unite_id', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Quantite Nette Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('quantite_nette', __('models/produitSemiFinis.fields.quantite_nette').':') !!}
    {!! Form::text('quantite_nette', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Poids Nette Egoutte Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('poids_nette_egoutte', __('models/produitSemiFinis.fields.poids_nette_egoutte').':') !!}
    {!! Form::text('poids_nette_egoutte', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Freinte Produit Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('freinte_produit', __('models/produitSemiFinis.fields.freinte_produit').':') !!}
    {!! Form::text('freinte_produit', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Taille Portion Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('taille_portion', __('models/produitSemiFinis.fields.taille_portion').':') !!}
    {!! Form::text('taille_portion', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Unite Portion Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('unite_portion', __('models/produitSemiFinis.fields.unite_portion').':') !!}
    {!! Form::text('unite_portion', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Texte Portion Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('texte_portion', __('models/produitSemiFinis.fields.texte_portion').':') !!}
    {!! Form::text('texte_portion', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Nombre Portion Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('nombre_portion', __('models/produitSemiFinis.fields.nombre_portion').':') !!}
    {!! Form::text('nombre_portion', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Cahier De Charge Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('cahier_de_charge', __('models/produitSemiFinis.fields.cahier_de_charge').':') !!}
    {!! Form::text('cahier_de_charge', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Date Limite Consommation Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('date_limite_consommation', __('models/produitSemiFinis.fields.date_limite_consommation').':') !!}
    {!! Form::text('date_limite_consommation', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Ddm Dua Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('ddm_dua', __('models/produitSemiFinis.fields.ddm_dua').':') !!}
    {!! Form::text('ddm_dua', null, ['class' => 'form-control','id'=>'ddm_dua']) !!}
</div>  --}}

@push('page_scripts')
    <script type="text/javascript">
        $('#ddm_dua').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Pao Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('pao', __('models/produitSemiFinis.fields.pao').':') !!}
    {!! Form::text('pao', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Duree Vie Minimum Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('duree_vie_minimum', __('models/produitSemiFinis.fields.duree_vie_minimum').':') !!}
    {!! Form::text('duree_vie_minimum', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Condition Conservation Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('condition_conservation_id', __('models/produitSemiFinis.fields.condition_conservation_id').':') !!}
    {!! Form::text('condition_conservation_id', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Precaution Emploi Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('precaution_emploi_id', __('models/produitSemiFinis.fields.precaution_emploi_id').':') !!}
    {!! Form::text('precaution_emploi_id', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Conseil Preparation Utilisation Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('conseil_preparation_utilisation', __('models/produitSemiFinis.fields.conseil_preparation_utilisation').':') !!}
    {!! Form::text('conseil_preparation_utilisation', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Prix Vente Uv Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('prix_vente_uv', __('models/produitSemiFinis.fields.prix_vente_uv').':') !!}
    {!! Form::text('prix_vente_uv', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Monnaie Id Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('monnaie_id', __('models/produitSemiFinis.fields.monnaie_id').':') !!}
    {!! Form::text('monnaie_id', null, ['class' => 'form-control']) !!}
</div>  --}}

<!-- Quantite Imprevisionnelle Field -->
{{--  <div class="form-group col-sm-6">
    {!! Form::label('quantite_imprevisionnelle', __('models/produitSemiFinis.fields.quantite_imprevisionnelle').':') !!}
    {!! Form::text('quantite_imprevisionnelle', null, ['class' => 'form-control']) !!}
</div>  --}}
