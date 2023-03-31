@extends('clients.layouts.app')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')

    <section class="content-header">
        <div class="card">
            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                <span class="nav-icon fas fa-plus"></span> Créer
            </a>
            <div class="dropdown-menu elements-create" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item" id="link-modal-dossier" data-bs-toggle="modal" data-bs-target="#dossier-modal"><i class="fas fa-folder"></i> Dossier</button>
                <button class="dropdown-item" id="link-modal-produit-fini" data-bs-toggle="modal" data-bs-target="#produit-fini-modal"><i class="fas fa-shopping-bag"></i> Produit fini</button>
                <button class="dropdown-item" id="link-modal-produit-semi-fini" data-bs-toggle="modal" data-bs-target="#produit-semi-fini-modal"><i class="fas fa-flask"></i> Produit semi fini</button>
            </div>
        </div>
    </section>
    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder"></i> | Documents
            </div>

            <div class="card-body p-0" id="div-change">
                <div class="loading" style="text-align:center">
                    <img src="{{asset('images/loading.gif')}}" alt="" width="150px" height="90px">
                </div>
                <ul class="list-group list-group-flush" id="data-ul">
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
                </ul>

                @include('dossiers.modals.modal_create_dossier')

                @include('dossiers.modals.modal_create_produit_semi_fini')
                @include('dossiers.modals.modal_create_produit_fini')

            </div>
            <div class="card-footer">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
            </div>
        </div>
    </div>
    @include('dossiers.script_treeview')
@endsection


