<div class="row">
    <!-- Nom Field -->
    {!! Form::hidden('id', $model->id, ['id' => 'id']) !!}

    <div class="form-group col-sm-6">
        {!! Form::label('nom', __('models/produitSemiFinis.fields.nom').':') !!}
        {!! Form::text('nom', $model->nom, ['class' => 'form-control','placeholder'=>'Désignation','id' => 'nom']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="nomError"></span>')) !!}
    </div>

    @if ($model->libelle_commerciale)
        <div class="form-group col-sm-6">
            {!! Form::label('libelle_commerciale', __('models/produitFinis.fields.libelle_commerciale').':') !!}
            {!! Form::text('libelle_commerciale', $model->libelle_commerciale, ['class' => 'form-control','placeholder'=>'Désignation','id' => 'libelle_commerciale']) !!}
            {!! Html::decode(Form::label('name','<span class="text-danger" id="libelle_commerciale"></span>')) !!}
        </div>
    @endif

    @if ($model->famille)
        <div class="form-group col-sm-6">
            {!! Form::label('famille', __('models/produitFinis.fields.famille').':') !!}
            {!! Form::select('famille',$famille,$model->famille, ['class' => 'form-control','id' => 'famille']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('sous_famille', __('models/produitFinis.fields.sous-famille').':') !!}
            {!! Form::select('sous_famille',[],null, ['class' => 'form-control', 'id' => 'sous_famille']) !!}
        </div>
    @endif

    <div class="form-group col-sm-6">
        {!! Form::label('libelle_legale', __('models/produitFinis.fields.libelle_legale').':') !!}
        {!! Form::text('libelle_legale', $model->libelle_legale, ['class' => 'form-control','id'=>'lib_leg']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="libelle_legaleErrorFini"></span>')) !!}
    </div>

    @if ($model['etat_produit'])
        <div class="form-group col-sm-6">
            {!! Form::label('etat_produit_id', __('models/produitFinis.fields.etat_produit_id').':') !!}
            {!! Form::select('etat_produit_id', $etat_prod,$model['etat_produit']->designation, ['class' => 'form-control','id'=>'etat_produit_id']) !!}
        </div>
    @endif

    <!-- Code Becpg Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_becpg', __('models/produitFinis.fields.code_becpg').':') !!}
        {!! Form::text('code_becpg', $model->code_becpg , ['class' => 'form-control','placeholder'=>'Code Bcpg','id'=>'code_becpg']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="code_bcepgErrorFini"></span>')) !!}
    </div>

    <!-- Code Erp Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('code_erp', __('models/produitFinis.fields.code_erp').':') !!}
        {!! Form::text('code_erp', $model->code_erp, ['class' => 'form-control','placeholder'=>'Codeerp','id'=>'code_erp']) !!}
        {!! Html::decode(Form::label('name','<span class="text-danger" id="code_erpErrorFini"></span>')) !!}
    </div>

    @if ($model->ean)
        <div class="form-group col-sm-6">
            {!! Form::label('ean', __('models/produitFinis.fields.ean').':') !!}
            {!! Form::text('ean', $model->ean, ['class' => 'form-control','id'=>'ean']) !!}
        </div>
    @endif

    @if ($model->ean_coli)
        <div class="form-group col-sm-6">
            {!! Form::label('ean_colis', __('models/produitFinis.fields.ean_colis').':') !!}
            {!! Form::text('ean_colis', $model->ean_coli, ['class' => 'form-control','id'=>'ean_colis']) !!}
        </div>
    @endif

    @if ($model->ean_palette)
        <div class="form-group col-sm-6">
            {!! Form::label('ean_palette', __('models/produitFinis.fields.ean_palette').':') !!}
            {!! Form::text('ean_palette', $model->ean_palette, ['class' => 'form-control','id'=>'ean_palette']) !!}
        </div>
    @endif

    @if ($model['filiale'] != null)
        <div class="form-group col-sm-6">
            {!! Form::label('filiale', __('models/produitFinis.fields.filiale').':') !!}
            {!! Form::select('filiale', [],$model['filiale'], ['class' => 'form-control','id'=>'filiale']) !!}
        </div>
    @endif
    @if ($model['marque'] != null)
        <div class="form-group col-sm-6">
            {!! Form::label('marque', __('models/produitFinis.fields.marque').':') !!}
            {!! Form::select('marque', $marque,$model['marque']->description , ['class' => 'form-control','id'=>'marque']) !!}
        </div>
    @endif
    @if ($model['usine'] != null)
        <div class="form-group col-sm-6">
            {!! Form::label('usine', __('models/produitFinis.fields.usine').':') !!}
            {!! Form::select('usine',$usines,$model['usine']->description, ['class' => 'form-control','id'=>'usine_id']) !!}
        </div>
    @endif
    @if ($model['geographique'] != null)
        <div class="form-group col-sm-6">
            {!! Form::label('geographique_id', __('models/produitFinis.fields.geographique_id').':') !!}
            {!! Form::select('geographique_id',$origines_geo ,$model['geographique']->description, ['class' => 'form-control','id'=>'geographique_id']) !!}
        </div>
    @endif
    @if ($model['client'] != null)
        {{--  <hr>
        <div  class="name-fields">
            <div class="name-description">{{__('models/produitFinis.fields.client')}} :</div>
            <div class="name-description-second">{{ $model['client'] }}</div>
        </div>  --}}
    @endif

</div>
