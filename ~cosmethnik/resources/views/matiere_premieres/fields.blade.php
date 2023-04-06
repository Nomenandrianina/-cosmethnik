<div class="row">
    <!-- Nom Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/matierePremieres.fields.nom').':',['class' => 'required']) !!}
        {!! Form::text('nom', null, ['class' => 'form-control','placeholder'=>'Désignation','id' => 'nom_mp']) !!}
        {!! Html::decode(Form::label('nom','<span class="text-danger" id="nomErrorMp"></span>')) !!}
    </div>

    <!-- Libelle Commerciale Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('libelle_commerciale', __('models/matierePremieres.fields.libelle_commerciale').':',['class' => 'required']) !!}
        {!! Form::text('libelle_commerciale', null, ['class' => 'form-control','placeholder'=>'Libellé commerciale','id' => 'lib_com_mp']) !!}
        {!! Html::decode(Form::label('libelle_commerciale','<span class="text-danger" id="libelle_commercialeErrorMp"></span>')) !!}
    </div>
</div>

<div class="row">
    <!-- Libelle Legale Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('libelle_legale', __('models/matierePremieres.fields.libelle_legale').':',['class' => 'required']) !!}
        {!! Form::text('libelle_legale', null, ['class' => 'form-control','placeholder'=>'Libellé légale','id' => 'lib_leg_mp']) !!}
        {!! Html::decode(Form::label('libelle_legale','<span class="text-danger" id="libelle_legaleErrorMp"></span>')) !!}
    </div>

    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('description', __('models/matierePremieres.fields.description').':') !!}
        {!! Form::text('description', null, ['class' => 'form-control','placeholder'=>'Description','id' => 'description_mp']) !!}
    </div>
</div>

<div class="row">
    <!-- Modele Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('modele', __('models/matierePremieres.fields.modele').':') !!}
        {!! Form::text('modele', null, ['class' => 'form-control','id'=>'modele_mp']) !!}
    </div>

    <!-- Code Becpg Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_becpg', __('models/matierePremieres.fields.code_becpg').':',['class' => 'required']) !!}
        {!! Form::text('code_becpg', null, ['class' => 'form-control','placeholder'=>'Code beCPG','id' => 'code_becpg_mp']) !!}
        {!! Html::decode(Form::label('code_becpg','<span class="text-danger" id="code_becpgErrorMp"></span>')) !!}
    </div>
</div>

<div class="row">
        <!-- Code Erp Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_erp', __('models/matierePremieres.fields.code_erp').':',['class' => 'required']) !!}
        {!! Form::text('code_erp', null, ['class' => 'form-control','placeholder'=>'Code beCPG','id' => 'code_erp_mp']) !!}
        {!! Html::decode(Form::label('code_becpg','<span class="text-danger" id="code_erpErrorMp"></span>')) !!}
    </div>

    <!-- Ean Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ean', __('models/matierePremieres.fields.ean').':') !!}
        {!! Form::text('ean', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <!-- Ean Colis Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ean_colis', __('models/matierePremieres.fields.ean_colis').':') !!}
        {!! Form::text('ean_colis', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Ean Palette Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ean_palette', __('models/matierePremieres.fields.ean_palette').':') !!}
        {!! Form::text('ean_palette', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <!-- Etat Produit Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('etat_produit_id', __('models/matierePremieres.fields.etat_produit_id').':') !!}
        {!! Form::text('etat_produit_id', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Filiale Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('filiale_id', __('models/matierePremieres.fields.filiale_id').':') !!}
        {!! Form::text('filiale_id', null, ['class' => 'form-control','id'=>'filiale_id_mp']) !!}
    </div>
</div>

<div class="row">
    <!-- Usine Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('usine_id', __('models/matierePremieres.fields.usine_id').':') !!}
        {!! Form::select('usine_id', $usines,null, ['class' => 'form-control','id'=>'usine_id_mp']) !!}
    </div>

    <!-- Geographique Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('geographique_id', __('models/matierePremieres.fields.geographique_id').':') !!}
        {!! Form::select('geographique_id',  $origines_geo,null, ['class' => 'form-control','id'=> 'geographique_id_mp']) !!}
    </div>
</div>
<div class="row">
    <!-- Marque Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('marque_id', __('models/matierePremieres.fields.marque_id').':') !!}
        {!! Form::select('marque_id',$marque ,null, ['class' => 'form-control','id'=>'marque_id_mp']) !!}
    </div>

    <!-- Client Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('client_id', __('models/matierePremieres.fields.client_id').':') !!}
        {!! Form::text('client_id', null, ['class' => 'form-control','id'=>'client_id_mp']) !!}
    </div>
</div>
<div class="row">
    <!-- Quantite Nette Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('quantite_nette', __('models/matierePremieres.fields.quantite_nette').':') !!}
        {!! Form::number('quantite_nette', null, ['class' => 'form-control','id'=>'quantite_nette_mp']) !!}
    </div>

    <!-- Unite Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('unite_id', __('models/matierePremieres.fields.unite_id').':') !!}
        {!! Form::text('unite_id', null, ['class' => 'form-control','id'=>'unite_id_mp']) !!}
    </div>
</div>
<div class="row">
    <!-- Poids Net Egoutte Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('poids_net_egoutte', __('models/matierePremieres.fields.poids_net_egoutte').':') !!}
        {!! Form::number('poids_net_egoutte', null, ['class' => 'form-control','id'=>'poids_net_egoutte_mp']) !!}
    </div>

    <!-- Freinte Produit Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('freinte_produit', __('models/matierePremieres.fields.freinte_produit').':') !!}
        {!! Form::text('freinte_produit', null, ['class' => 'form-control','id'=>'freinte_produit_mp']) !!}
    </div>

</div>
<div class="row">
    <!-- Taille Portion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('taille_portion', __('models/matierePremieres.fields.taille_portion').':') !!}
        {!! Form::text('taille_portion', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Unite Portion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('unite_portion', __('models/matierePremieres.fields.unite_portion').':') !!}
        {!! Form::text('unite_portion', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row">
    <!-- Texte Portion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('texte_portion', __('models/matierePremieres.fields.texte_portion').':') !!}
        {!! Form::text('texte_portion', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Nombre Portion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nombre_portion', __('models/matierePremieres.fields.nombre_portion').':') !!}
        {!! Form::text('nombre_portion', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <!-- Cahier Charge Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('cahier_charge', __('models/matierePremieres.fields.cahier_charge').':') !!}
        {!! Form::text('cahier_charge', null, ['class' => 'form-control']) !!}
    </div>


</div>
<div class="row">
    <!-- Date Limite Consommation Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('date_limite_consommation', __('models/matierePremieres.fields.date_limite_consommation').':') !!}
        {!! Form::text('date_limite_consommation', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Ddm Dua Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ddm_dua', __('models/matierePremieres.fields.ddm_dua').':') !!}
        {!! Form::text('ddm_dua', null, ['class' => 'form-control']) !!}
    </div>

</div>

<!-- Description Conditionnement Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('description_conditionnement', __('models/matierePremieres.fields.description_conditionnement').':') !!}
    {!! Form::text('description_conditionnement', null, ['class' => 'form-control']) !!}
</div> --}}







{{-- <!-- Dossier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dossier_id', __('models/matierePremieres.fields.dossier_id').':') !!}
    {!! Form::text('dossier_id', null, ['class' => 'form-control']) !!}
</div> --}}
















