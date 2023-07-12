@extends('clients.layouts.models.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('modeleAllergenes.store') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id_model" value="{{ $data[0] }}">
                    <input type="hidden" name="id_site" value="{{ $data[1] }}">
                    <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                    <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                    <input type="hidden" name="model_type" value="{{ $object }}">
                </div>
            </form>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                        <a class="dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;display: block;
                        padding: .5rem 1rem;">
                            <span class="nav-icon fas fa-plus"></span> Créer
                        </a>
                        <div class="dropdown-menu elements-create" aria-labelledby="navbarDropdownMenuLink">
                            <button class="dropdown-item" id="link-modal-image" data-bs-toggle="modal" data-bs-target="#dossier-modal"><i class="fas fa-image"></i> Image</button>
                            <button class="dropdown-item" id="link-modal-fichier" data-bs-toggle="modal" data-bs-target="#produit-fini-modal"><i class="fas fa-file"></i> Fichier</button>
                        </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-file"></i>
                    | <a class="link-document">
                            Fichiers
                        </a>
                    |
                <span id="bread-change"></span>
            </div>
            <div class="card-body p-0">
                <ul class='list-group list-group-flush' id='data-ul'>
                    <li class="list-group-item">
                        <a style="cursor:pointer">
                            <span class="one-span">
                                <span class="two-span">
                                    <i class="fas fa-image fa-3x" style="color: #1a4a51"></i>
                                </span>
                                <span class="three-span">
                                        Images
                                        <br>
                                       <small>Aucune description</small>
                                </span>
                            </span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a style="cursor:pointer">
                            <span class="one-span">
                                <span class="two-span">
                                    <i class="fas fa-file fa-3x" style="color: #1a4a51"></i>
                                </span>
                                <span class="three-span">
                                        Fichiers
                                        <br>
                                       <small>Aucune description</small>
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

@endsection
