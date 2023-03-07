@extends('clients.layouts.app')

<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')
    <section class="content-header">
        <div class="card">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                       @lang('models/dossiers.plural')
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-primary float-right"
                           href="{{ route('dossiers.create') }}">
                             @lang('crud.add_new')
                        </a>
                    </div>
                </div>
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

            <div class="card-body p-0">
                <ul class="list-group list-group-flush" id="data-ul">
                    @foreach($doc as $category)
                        @foreach ( $category->childs as $child )
                            <li class="list-group-item">
                                <a href="#">
                                    <span class="one-span">
                                        <span class="two-span"><i class="fas fa-folder fa-3x"></i></span>
                                        <span class="three-span">
                                            {{ $child->title }} <br>
                                            @if ($child->description)
                                                <small>Modifié il y a 10 jours </small>
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

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dossiers.script_treeview')
@endsection


