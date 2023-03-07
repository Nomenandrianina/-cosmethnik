@extends('clients.layouts.app')


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
            <div class="card-body p-0">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @foreach($doc as $category)
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <p>
                                    {{ $category->title }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            @if(count($category->childs))
                                @include('dossiers.child',['childs' => $category->childs])
                            @endif
                        </li>
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


