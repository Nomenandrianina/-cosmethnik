<div class="row">
    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/produitFinis.fields.nom').':',['class' => 'required']) !!}
        {!! Form::text('nom', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Libelle Commerciale Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('libelle_commerciale', __('models/produitFinis.fields.libelle_commerciale').':') !!}
        {!! Form::text('libelle_commerciale', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('famille', __('models/produitFinis.fields.famille').':') !!}
        {!! Form::select('famille', $famille,null, ['class' => 'form-control','id' => 'fini-famille']) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sous_famille', __('models/produitFinis.fields.sous-famille').':') !!}
        {!! Form::select('sous_famille',[],null, ['class' => 'form-control', 'id' => 'fini-sous-famille']) !!}
    </div>
</div>

<div class="row">
    <!-- Code Bcepg Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_bcepg', __('models/produitFinis.fields.code_bcepg').':') !!}
        {!! Form::text('code_bcepg', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Code Erp Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_erp', __('models/produitFinis.fields.code_erp').':') !!}
        {!! Form::text('code_erp', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">

    <!-- Etat Produit Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('etat_produit_id', __('models/produitFinis.fields.etat_produit_id').':') !!}
        {!! Form::select('etat_produit_id', $etat_prod,null, ['class' => 'form-control']) !!}
    </div>

    <!-- Etat Produit Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('modele', __('models/produitFinis.fields.modele').':') !!}
        {!! Form::select('modele', $modele,null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <!-- Usine Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('usine_id', __('models/produitFinis.fields.usine_id').':') !!}
        {!! Form::select('usine_id', $usines,null, ['class' => 'form-control']) !!}
    </div>

    <!-- Geographique Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('geographique_id', __('models/produitFinis.fields.geographique_id').':') !!}
        {!! Form::select('geographique_id', $origines_geo,null, ['class' => 'form-control','icon' => '<i class="fas fa-globe-europe"></i>']) !!}
    </div>
</div>

<!-- Libelle Legale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_legale', __('models/produitFinis.fields.libelle_legale').':') !!}
    {!! Form::text('libelle_legale', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/produitFinis.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','rows'=>3]) !!}
</div>


{{--

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/produitFinis.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Commerciale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_commerciale', __('models/produitFinis.fields.libelle_commerciale').':') !!}
    {!! Form::text('libelle_commerciale', null, ['class' => 'form-control']) !!}
</div>

<!-- Libelle Legale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle_legale', __('models/produitFinis.fields.libelle_legale').':') !!}
    {!! Form::text('libelle_legale', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/produitFinis.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Modele Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modele', __('models/produitFinis.fields.modele').':') !!}
    {!! Form::text('modele', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Bcpg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_bcpg', __('models/produitFinis.fields.code_bcpg').':') !!}
    {!! Form::text('code_bcpg', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Erp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_erp', __('models/produitFinis.fields.code_erp').':') !!}
    {!! Form::text('code_erp', null, ['class' => 'form-control']) !!}
</div>

<!-- Ean Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ean', __('models/produitFinis.fields.ean').':') !!}
    {!! Form::text('ean', null, ['class' => 'form-control']) !!}
</div>

<!-- Ean Colis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ean_colis', __('models/produitFinis.fields.ean_colis').':') !!}
    {!! Form::text('ean_colis', null, ['class' => 'form-control']) !!}
</div>

<!-- Ean Palette Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ean_palette', __('models/produitFinis.fields.ean_palette').':') !!}
    {!! Form::text('ean_palette', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantite Nette Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantite_nette', __('models/produitFinis.fields.quantite_nette').':') !!}
    {!! Form::text('quantite_nette', null, ['class' => 'form-control']) !!}
</div>

<!-- Poids Net Egoutte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poids_net_egoutte', __('models/produitFinis.fields.poids_net_egoutte').':') !!}
    {!! Form::text('poids_net_egoutte', null, ['class' => 'form-control']) !!}
</div>

<!-- Freinte Produit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('freinte_produit', __('models/produitFinis.fields.freinte_produit').':') !!}
    {!! Form::text('freinte_produit', null, ['class' => 'form-control']) !!}
</div>

<!-- Taille Portion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('taille_portion', __('models/produitFinis.fields.taille_portion').':') !!}
    {!! Form::text('taille_portion', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Portion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite_portion', __('models/produitFinis.fields.unite_portion').':') !!}
    {!! Form::text('unite_portion', null, ['class' => 'form-control']) !!}
</div>

<!-- Texte Portion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('texte_portion', __('models/produitFinis.fields.texte_portion').':') !!}
    {!! Form::text('texte_portion', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Portion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_portion', __('models/produitFinis.fields.nombre_portion').':') !!}
    {!! Form::text('nombre_portion', null, ['class' => 'form-control']) !!}
</div>

<!-- Cdc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cdc', __('models/produitFinis.fields.cdc').':') !!}
    {!! Form::text('cdc', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Limite Consommation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_limite_consommation', __('models/produitFinis.fields.date_limite_consommation').':') !!}
    {!! Form::text('date_limite_consommation', null, ['class' => 'form-control']) !!}
</div>

<!-- Ddm Dua Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ddm_dua', __('models/produitFinis.fields.ddm_dua').':') !!}
    {!! Form::text('ddm_dua', null, ['class' => 'form-control']) !!}
</div>

<!-- Dossier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dossier_id', __('models/produitFinis.fields.dossier_id').':') !!}
    {!! Form::text('dossier_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Etat Produit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat_produit_id', __('models/produitFinis.fields.etat_produit_id').':') !!}
    {!! Form::text('etat_produit_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Filiale Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filiale_id', __('models/produitFinis.fields.filiale_id').':') !!}
    {!! Form::text('filiale_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Usine Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usine_id', __('models/produitFinis.fields.usine_id').':') !!}
    {!! Form::text('usine_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Geographique Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('geographique_id', __('models/produitFinis.fields.geographique_id').':') !!}
    {!! Form::text('geographique_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Marque Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marque_id', __('models/produitFinis.fields.marque_id').':') !!}
    {!! Form::text('marque_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', __('models/produitFinis.fields.client_id').':') !!}
    {!! Form::text('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Unite Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('unite_id', __('models/produitFinis.fields.unite_id').':') !!}
    {!! Form::text('unite_id', null, ['class' => 'form-control']) !!}
</div> --}}
