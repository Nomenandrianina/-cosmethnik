@extends('clients.layouts.app')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')
    <section class="content-header" id="header">
        <div class="card">
            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                <span class="nav-icon fas fa-plus"></span> Créer
            </a>
            <div class="dropdown-menu elements-create" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item" id="link-modal-dossier" data-bs-toggle="modal" data-bs-target="#dossier-modal"><i class="fas fa-folder"></i> Dossier</button>
                <button class="dropdown-item" id="link-modal-produit-fini" data-bs-toggle="modal" data-bs-target="#produit-fini-modal"><i class="fas fa-shopping-bag"></i> Produit fini</button>
                <button class="dropdown-item" id="link-modal-produit-semi-fini" data-bs-toggle="modal" data-bs-target="#produit-semi-fini-modal"><i class="fas fa-flask"></i> Produit semi fini</button>
                <button class="dropdown-item" id="link-modal-matiere-premiere" data-bs-toggle="modal" data-bs-target="#matiere-premiere-modal"><i class="fas fa-apple-alt"></i> Matière première</button>
                <button class="dropdown-item" id="link-modal-emballage" data-bs-toggle="modal" data-bs-target="#emballage-modal"><i class="fas fa-inbox"></i> Emballage</button>
                <button class="dropdown-item" id="link-modal-ressource" data-bs-toggle="modal" data-bs-target="#ressource-modal"><i class="fas fa-user-alt"></i> Ressource</button>
            </div>
        </div>
    </section>

    <div class="content px-3" id="info-site" style="padding: 13px 0 0 0;">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-header">
                    Détails du site
                </div>
                <div class="card-body">
                    <li class="list-group-item">
                            <span class="one-span">
                                <span class="two-span"><i class="fas fa-globe fa-3x"></i></span>
                                <span class="three-span">
                                    {{ $site_texte[0]->nom }}
                                    <br>
                                    <small>{{ $site_texte[0]->type }} (créer par {{ $site_texte[0]->user->name }} )</small>
                                </span>
                            </span>
                        </a>
                    </li>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Membres du site
                </div>
                <div class="card-body">
                            @foreach($membres as $membre)
                                    <li class="list-group-item">
                                            <span class="one-span">
                                                <span class="two-span"><i class="fas fa-user fa-3x"></i></span>
                                                <span class="three-span">
                                                    {{ $membre->name }}
                                                    <br>
                                                    <small>Membre depuis le {{ dateParse($membre->created_at) }}</small>
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                            @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="loading-produit-semi-fini" style="text-align:center" >
        <div id="loading" class="lds-dual-ring"></div>
    </div>
    <div class="content px-3" id="document">
        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder"></i> | Documents | <span id="bread-change"></span>
            </div>

            <div class="card-body p-0" id="div-change">
            </div>


            <div class="card-footer paginations-all" style="margin-left: auto;margin-right: auto;">
                <div id="pagination" style="display: flex;">
                        <a href="#" class="previous-link"><i class="fas fa-chevron-left"></i></a>
                        <a href="#" class="next-link"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    @include('dossiers.modals.modal_create_dossier')
    @include('produit_finis.modals.modal_create_produit_fini')
    @include('produit_semi_finis.modals.modal_create_produit_semi_fini')
    @include('matiere_premieres.modals.modal_create_matiere_premiere')
    @include('emballages.modals.modal_create_emballage')
    @include('ressources.modals.modal_create_ressource')
    @include('dossiers.scripts.scripts_dossiers')
    @include('produit_finis.scripts.scripts_produits_finis')
    @include('produit_semi_finis.scripts.scripts_produits_semi_finis')
    @include('matiere_premieres.scripts.scripts_matiere_premiere')
    @include('emballages.scripts.scripts_emballage')
    @include('ressources.scripts.scripts_ressources')
    @include('dossiers.scripts.scripts_delete')
@endsection
