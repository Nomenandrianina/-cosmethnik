@extends('clients.layouts.app')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')

    <section class="content-header">
        <div class="card">
            <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                <span class="nav-icon fas fa-plus"></span> Créer
            </a>
            <div class="dropdown-menu elements-create" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item" id="link-modal" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-file"> Dossier</i>
                <button class="dropdown-item" id="link-modal-produit" data-bs-toggle="modal" data-bs-target="#produitmodal"><i class="fas fa-file"> Produit semi fini</i></button>
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
                                <a onclick="actions({{ $child->id }})" style="cursor: pointer">
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

                <div class="modal fade" id="produitmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    {!! Form::open(['route' => 'dossiers.store']) !!}
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h2 class="modal-title fs-5" id="exampleModalLabel">Créer un nouveau produit semi finis</h2>
                            </div>
                            <div class="modal-body">
                                @include('produit_semi_finis.fields')
                            </div>
                            <div class="modal-footer">
                                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                                <a id="close" class="btn btn-default">
                                @lang('crud.cancel')
                                </a>
                            </div>
                        </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="examplemodalsLabel" aria-hidden="true">
                    {{--  {!! Form::open(['route' => 'dossiers.store']) !!}  --}}
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title fs-5" id="examplemodalsLabel">Créer un nouveau dossier</h2>
                        </div>
                        <div class="modal-body">
                          @include('dossiers.fields')
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                            <a id="close" class="btn btn-default">
                             @lang('crud.cancel')
                            </a>
                        </div>
                      </div>
                    </div>
                    {{--  {!! Form::close() !!}  --}}
                </div>
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


