@extends('clients.layouts.models.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')
{{--  $dossier_parent  --}}
    <section class="content-header">
        <div class="card">
            <a class="nav-link "  onclick="Back_page('{{ $dossier_parent }}')"   style="cursor: pointer">
                {{--  <i class="fas fa-print"></i> Imprimer  --}}
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </section>

    <div class="content px-3">
        @include('flash::message')
        <div class="loading-produit-semi-fini" style="text-align:center" >
            <div id="loading" class="lds-dual-ring"></div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color: #1a4a51;color: aliceblue;">
                <div class="row">
                    <div class="col-md-10">
                        Désignation
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" id="link-modal-edit" data-bs-toggle="modal" data-bs-target="#edit-modal" style="    background-color: #1a4a51;
                        border: none;"><i class="fas fa-edit"></i> Modifier</button>
                    </div>
                </div>
            </div>

            <div class="card-body p-0" id="div-change">

                <div class="list-group">
                    @if ($model->nom)
                        <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Nom :</h5>
                            <small>{{ $model->nom }}</small>
                        </div>
                        </a>
                    @endif

                    @if ($model->libelle_commerciale)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Libellé commerciale :</h5>
                            <small>{{ $model->libelle_commerciale }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model->libelle_legale)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Libellé legale :</h5>
                            <small>{{ $model->libelle_legale }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model->description)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Description  :</h5>
                            <small>{{ $model->description }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model['etat_produit'])
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Désignation  :</h5>
                            <small>{{ $model['etat_produit']->designation }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model->code_becpg)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Code beCPG :</h5>
                            <small>{{ $model->code_becpg }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model->code_erp)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Code ERP :</h5>
                            <small>{{ $model->code_erp }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model->ean)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">EAN :</h5>
                            <small>{{ $model->ean }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model->ean_colis)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">EAN Colis :</h5>
                            <small>{{ $model->ean_colis }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model->ean_palette)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">EAN Palette :</h5>
                            <small>{{ $model->ean_palette }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model['filiale'] != null)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Filiale :</h5>
                            <small>{{ $model['filiale'] }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model['marque'] != null)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Marque :</h5>
                            <small>{{ $model['marque']->description }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model['usine'] != null)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Usine :</h5>
                            <small>{{ $model['usine']->description }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model['geographique'] != null)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Origine géographique :</h5>
                            <small>{{ $model['geographique']->description }}</small>
                            </div>
                        </a>
                    @endif

                    @if ($model['client'] != null)
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between" style="padding: 0px;">
                            <h5 class="mb-1">Client :</h5>
                            <small>{{ $model['client'] }}</small>
                            </div>
                        </a>
                    @endif


                  </div>
            </div>
        </div>
    </div>
    @include('proprietes.modal_edit')
    @include('proprietes.script.scripts_proprietes')
    <script>
        $('.loading-produit-semi-fini').hide();
    </script>
@endsection
