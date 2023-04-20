<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/clients.fields.nom').':',['class' => 'required']) !!}
    {!! Form::text('nom', null, ['class' => 'form-control'. ( $errors->has('nom') ? ' is-invalid' : '' ),'placeholder'=>'Nom']) !!}
    @if($errors->has('nom'))
        <span class="text-danger">{{ $errors->first('nom') }}</span>
    @endif
</div>

<!-- Titre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titre', __('models/clients.fields.titre').':',['class' => 'required']) !!}
    {!! Form::text('titre', null, ['class' => 'form-control'. ( $errors->has('titre') ? ' is-invalid' : '' ),'placeholder'=>'Titre']) !!}
    @if($errors->has('titre'))
        <span class="text-danger">{{ $errors->first('titre') }}</span>
    @endif
</div>

<!-- Etat Client Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat_client', __('models/clients.fields.etat_client').':') !!}
    {!! Form::text('etat_client', null, ['class' => 'form-control'.( $errors->has('etat_client') ? ' is-invalid' : '' ),'placeholder'=>'etat_client']) !!}
    @if($errors->has('etat_client'))
        <span class="text-danger">{{ $errors->first('etat_client') }}</span>
    @endif
</div>

<!-- Code Bcpg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_bcpg', __('models/clients.fields.code_bcpg').':',['class' => 'required']) !!}
    {!! Form::text('code_bcpg', null, ['class' => 'form-control'.( $errors->has('code_bcpg') ? ' is-invalid' : '' ),'placeholder'=>'Code bcpg']) !!}
    @if($errors->has('code_bcpg'))
        <span class="text-danger">{{ $errors->first('code_bcpg') }}</span>
    @endif
</div>

<!-- Code Erp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_erp', __('models/clients.fields.code_erp').':',['class' => 'required']) !!}
    {!! Form::text('code_erp', null, ['class' => 'form-control'.( $errors->has('code_erp') ? ' is-invalid' : '' ),'placeholder'=>'Code erp']) !!}
    @if($errors->has('code_erp'))
        <span class="text-danger">{{ $errors->first('code_erp') }}</span>
    @endif
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', __('models/clients.fields.telephone').':',['class' => 'required']) !!}
    {!! Form::text('telephone', null, ['class' => 'form-control'.( $errors->has('telephone') ? ' is-invalid' : '' ),'placeholder'=>'Numéro de téléphone']) !!}
    @if($errors->has('telephone'))
        <span class="text-danger">{{ $errors->first('telephone') }}</span>
    @endif
</div>

<!-- Mail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail', __('models/clients.fields.mail').':',['class' => 'required']) !!}
    {!! Form::text('mail', null, ['class' => 'form-control'.( $errors->has('mail') ? ' is-invalid' : '' ),'placeholder'=>'Adresse email']) !!}
    @if($errors->has('mail'))
        <span class="text-danger">{{ $errors->first('mail') }}</span>
    @endif
</div>

<!-- Fax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fax', __('models/clients.fields.fax').':') !!}
    {!! Form::text('fax', null, ['class' => 'form-control'.( $errors->has('fax') ? ' is-invalid' : '' ),'placeholder'=>'Fax']) !!}
    @if($errors->has('fax'))
        <span class="text-danger">{{ $errors->first('fax') }}</span>
    @endif
</div>

<!-- Adress1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adress1', __('models/clients.fields.adress1').':',['class' => 'required']) !!}
    {!! Form::text('adress1', null, ['class' => 'form-control'.( $errors->has('adress1') ? ' is-invalid' : '' ),'placeholder'=>'Adresse']) !!}
    @if($errors->has('adress1'))
        <span class="text-danger">{{ $errors->first('adress1') }}</span>
    @endif
</div>

<!-- Adress2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adress2', __('models/clients.fields.adress2').':') !!}
    {!! Form::text('adress2', null, ['class' => 'form-control','placeholder'=>'Deuxième adresse']) !!}
</div>

<!-- Adress3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adress3', __('models/clients.fields.adress3').':') !!}
    {!! Form::text('adress3', null, ['class' => 'form-control','placeholder'=>'Troisième adresse']) !!}
</div>

<!-- Ville Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ville', __('models/clients.fields.ville').':') !!}
    {!! Form::text('ville', null, ['class' => 'form-control','placeholder'=>'Ville']) !!}
</div>

<!-- Code Postal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_postal', __('models/clients.fields.code_postal').':') !!}
    {!! Form::text('code_postal', null, ['class' => 'form-control','placeholder'=>'Code postal']) !!}
</div>

<!-- Pays Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pays_id', __('models/clients.fields.pays_id').':') !!}
    {{--  {!! Form::text('pays_id', null, ['class' => 'form-control']) !!}  --}}
    {!! Form::select('pays_id',  $pays,null, ['class' => 'form-control']) !!}
</div>
