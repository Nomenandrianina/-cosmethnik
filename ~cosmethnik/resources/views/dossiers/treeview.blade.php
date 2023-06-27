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

    <div class="content px-3" id="info-site">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-header">
                    Détails du site
                </div>
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Membres du site
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush" id="data-ul">
                            @foreach($membres as $membre)
                                    <li class="list-group-item">
                                            <span class="one-span">
                                                <span class="two-span"><i class="fas fa-user fa-3x"></i></span>
                                                <span class="three-span">
                                                    {{ $membre->name }}
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                            @endforeach
                    </ul>
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
                <ul class="list-group list-group-flush" id="data-ul">
                    @if ($doc->isEmpty() != true)
                        @foreach($doc as $category)
                            @foreach ( $category->childs as $child )
                                <li class="list-group-item">
                                    <a onclick="getDetails({{ $child->id }} ,{{ $doc[0]->sites_id }}, '{{ $child->title }}')" style="cursor: pointer">
                                        <span class="one-span">
                                            <span class="two-span"><i class="fas fa-folder fa-3x"></i></span>
                                            <span class="three-span">
                                                {{ $child->title }} <br>
                                                @if ($child->description)
                                                    <small>{{ $child->description }}</small>
                                                @else
                                                    <small>Aucune description </small>
                                                @endif
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        @endforeach
                    @else
                        <p style='text-align:center;margin: revert;'>Aucun élément trouvé</p>
                    @endif
                </ul>
            </div>

            @include('dossiers.modals.modal_create_dossier')
            @include('produit_finis.modals.modal_create_produit_fini')
            @include('produit_semi_finis.modals.modal_create_produit_semi_fini')
            @include('matiere_premieres.modals.modal_create_matiere_premiere')
            @include('emballages.modals.modal_create_emballage')
            @include('ressources.modals.modal_create_ressource')

            <div class="card-footer paginations-all">
                <div class="paginations-all">
                    {!! $doc->links() !!}
                </div>
            </div>
        </div>
    </div>
    @include('dossiers.scripts.scripts_dossiers')
    @include('produit_finis.scripts.scripts_produits_finis')
    @include('produit_semi_finis.scripts.scripts_produits_semi_finis')
    @include('matiere_premieres.scripts.scripts_matiere_premiere')
    @include('emballages.scripts.scripts_emballage')
    @include('ressources.scripts.scripts_ressources')
@endsection
