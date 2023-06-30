@extends('clients.layouts.models.app')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@section('content')
    <section class="content-header">
        <div class="card">
            <a class="nav-link "  id="print"  style="cursor: pointer">
                <i class="fas fa-print"></i> Imprimer
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
                Désignation
            </div>

            <div class="card-body p-0" id="div-change">
                    <div  style="display: grid; grid-template-columns: 80% 20%;margin: 12px 0 -6px 0;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.nom')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->nom }}</div>
                    </div>

                    @if ($model->libelle_commerciale)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.libelle_commerciale')}} :</div>
                            <div style="margin: 5px 0 5px 20px;">{{ $model->libelle_commerciale }}</div>
                        </div>
                    @endif

                    @if ($model->famille)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.famille')}} :</div>
                            <div style="margin: 5px 0 5px 20px;"></div>
                        </div>
                    @endif

                    @if ($model->famille)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.sous-famille')}} :</div>
                            <div style="margin: 5px 0 5px 20px;"></div>
                        </div>
                    @endif

                    <hr>
                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.libelle_legale')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->libelle_legale }}</div>
                    </div>

                    <hr>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.description')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->description }}</div>
                    </div>

                    @if ($model['etat_produit'])
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.etat_produit_id')}} :</div>
                            <div style="margin: 5px 0 5px 20px;">{{ $model['etat_produit']->designation }}</div>
                        </div>
                    @endif
                    <hr>
                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.code_bcpg')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->code_bcpg }}</div>
                    </div>
                    <hr>
                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.code_erp')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->code_erp }}</div>
                    </div>
                    @if ($model->ean)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.ean')}} :</div>
                            <div style="margin: 5px 0 5px 20px;">{{ $model->ean }}</div>
                        </div>
                    @endif

                    @if ($model->ean_coli)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.ean_colis')}} :</div>
                            <div style="margin: 5px 0 5px 20px;">{{ $model->ean_colis }}</div>
                        </div>
                    @endif

                    @if ($model->ean_palette)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.ean_palette')}} :</div>
                            <div style="margin: 5px 0 5px 20px;">{{ $model->ean_palette }}</div>
                        </div>
                    @endif

                    @if ($model['filiale'] != null)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.filiale')}} :</div>
                                <div style="margin: 5px 0 5px 20px;">{{ $model['filiale'] }}</div>
                        </div>
                    @endif
                    @if ($model['marque'] != null)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.marque')}} :</div>
                                <div style="margin: 5px 0 5px 20px;">{{ $model['marque']->description }}</div>
                        </div>
                    @endif
                    @if ($model['usine'] != null)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.usine_id')}} :</div>
                                <div  style="margin: 5px 0 5px 20px;">{{ $model['usine']->description }}</div>
                        </div>
                    @endif
                    @if ($model['geographique'] != null)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.geographique_id')}} :</div>
                            <div style="margin: 5px 0 5px 20px;">{{ $model['geographique']->description }}</div>
                        </div>
                    @endif
                    @if ($model['client'] != null)
                        <hr>
                        <div  style="display: grid; grid-template-columns: 80% 20%;">
                            <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.client')}} :</div>
                            <div style="margin: 5px 0 5px 20px;">{{ $model['client'] }}</div>
                        </div>
                    @endif


            </div>
        </div>

    </div>
    <script>
        $('.loading-produit-semi-fini').hide();
    </script>
@endsection


