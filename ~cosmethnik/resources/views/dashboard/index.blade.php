@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@lang('models/dashboards.header.index')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">@lang('common.module.home')</a></li>
                    <li class="breadcrumb-item active">@lang('common.module.dashboard')</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

@if (Auth::user()->role_text == 'supper-admin' )
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">
                            {{$dashboardInfo['user_count']}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-user-shield"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Roles</span>
                        <span class="info-box-number">
                            {{$dashboardInfo['user_count']}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-shield-alt"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Perrmisons</span>
                        <span class="info-box-number">
                            {{$dashboardInfo['permission_count']}}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1">
                        <i class="fas fa-signal"></i>
                    </span>

                    <div class="info-box-content">
                        <span class="info-box-text">Online</span>
                        <span class="info-box-number" id="user_online">{{$dashboardInfo['user_online']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User checkin/out</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item">Action</a>
                                    <a href="#" class="dropdown-item">Another action</a>
                                    <a href="#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <canvas id="userCheckinChart" height="315" style="height: 180px; display: block; width: 462px;" width="808" class="chartjs-render-monitor"></canvas>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
@endif
@if (Auth::user()->role_text == 'user-client' )
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>DÉMARRAGE</h4>
                        <p class="card-text">Le tableau de bord vous permet d'accéder rapidement à tous vos menus</p>
                        <h5>Commençons...</h5>
                        <div class="row">
                            <div class="col">
                                <span class="one-prod">
                                    <span class="two-prod"><i class="fas fa-solid fa-box-open fa-4x"></i></span>
                                    <span class="three-prod">
                                        Produits <br> Créez de nouveaux produits <br> <small>Créer un produit</small>
                                    </span>
                                </span>
                              </div>
                              <div class="col">
                                <span class="one-emb">
                                    <span class="two-emb"><i class="fas fa-inbox fa-4x"></i></span>
                                    <span class="three-emb">
                                        Emballage <br> Créez de nouveaux produits <br> <small>Créer un produit</small>
                                    </span>
                                </span>
                              </div>
                              <div class="col">
                                <span class="one-mp">
                                    <span class="two-mp"><i class="fas fa-apple-alt fa-4x"></i></span>
                                    <span class="three-mp">
                                        Matière première <br> Créez de nouveaux matière <br> <small>Créer un produit</small>
                                    </span>
                                </span>
                              </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header" style="background-color:#1a4a51">
                            <h5 class="card-title" style="color: #f8f9fa">Mes sites</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <button  class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Tous
                                      </button>
                                      <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Collaboratif</a></li>
                                      <li><a class="dropdown-item" href="#">Produit</a></li>
                                      </ul>
                              </div>
                                <div class="col-md-4">
                                    <div class="form-group has-search">
                                        <a class="dropdown-item" id="link-modal" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="nav-icon fas fa-solid fa-globe"></span> Créer un site </a>
                                      </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush" id="list-site">
                                @foreach ($sites as $item)
                                    <li class="list-group-item">
                                        <a href="#">
                                            <span class="one-site">
                                                <span class="two-site"><i class="fas fa-solid fa-globe fa-2x"></i></span>
                                                <span class="three-site">
                                                    {{ $item->nom }} <br> <small>{{ $item->type }}</small>
                                                </span>
                                            </span>

                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-center">
                                {{ $sites->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::open(['route' => 'sites.store']) !!}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h2 class="modal-title fs-5" id="exampleModalLabel">Créer un nouveau sites</h2>
                        </div>
                        <div class="modal-body">
                          @include('sites.fields')
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                            <a id="close" class="btn btn-default">
                             @lang('crud.cancel')
                            </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  {!! Form::close() !!}

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header" style="background-color:#1a4a51">
                            <h5 class="card-title" style="color: #f8f9fa">Catalogue produit</h5>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group has-search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                        <input type="text" onkeyup="searchCatalogue()" id="search-catalogue" class="form-control" placeholder="Search">
                                      </div>
                                </div>
                                <div class="col-md-3">
                                      <button  class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Validé
                                        </button>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">En cours</a></li>
                                        <li><a class="dropdown-item" href="#">Terminer</a></li>
                                        </ul>
                                </div>
                                <div class="col-md-4">
                                        <button  class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Produit fini
                                        </button>
                                        <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Produit semi-fini</a></li>
                                        <li><a class="dropdown-item" href="#">Produit semi-fini local</a></li>
                                        <li><a class="dropdown-item" href="#">Matière première</a></li>
                                        {{-- <li><hr class="dropdown-divider"></li> --}}
                                        <li><a class="dropdown-item" href="#">Emballage</a></li>
                                        </ul>

                                </div>

                            </div>
                            <ul class="list-group list-group-flush" id="data-ul">
                                <li class="list-group-item">
                                    <a href="#">
                                        <span class="one-span">
                                            <span class="two-span"><i class="fas fa-solid fa-box-open fa-2x"></i></span>
                                            <span class="three-span">
                                                Brownies <br> <small>Modifié il y a 10 jours </small>
                                            </span>
                                        </span>

                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <span class="one-span">
                                            <span class="two-span"><i class="fas fa-solid fa-box-open fa-2x"></i></span>
                                            <span class="three-span">
                                                Soupe de courgettes <br> <small>Modifié il y a 6 jours </small>
                                            </span>
                                        </span>

                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <span class="one-span">
                                            <span class="two-span"><i class="fas fa-solid fa-box-open fa-2x"></i></span>
                                            <span class="three-span">
                                                Milk shake <br> <small>Modifié il y a 2 jours </small>
                                            </span>
                                        </span>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</section>
@endif

@include('dashboard.script_search_catalogue')

<!-- /.content -->
@endsection

@push('third_party_scripts')
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js" integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@endpush
@push('page_scripts')

<script>
var userCheckinChart = new Chart(document.getElementById('userCheckinChart').getContext('2d'), @json($chartUserCheckin));
</script>

@endpush
