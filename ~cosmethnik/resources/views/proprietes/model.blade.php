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
                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.nom')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->nom }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.libelle_commerciale')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->libelle_commerciale }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.famille')}} :</div>
                        <div style="margin: 5px 0 5px 20px;"></div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.sous-famille')}} :</div>
                        <div style="margin: 5px 0 5px 20px;"></div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.libelle_legale')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->libelle_legale }}</div>
                    </div>



                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.description')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->description }}</div>
                    </div>



                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.etat_produit_id')}} :</div>
                        @if ($model['etat_produit']!= null)
                            <div style="margin: 5px 0 5px 20px;">{{ $model['etat_produit']->designation }}</div>
                        @endif
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.code_bcpg')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->code_bcpg }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.code_erp')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->code_erp }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.ean')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->ean }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.ean_colis')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->ean_colis }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.ean_palette')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->ean_palette }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.filiale')}} :</div>
                        @if ($model['filiale'] != null)
                            <div style="margin: 5px 0 5px 20px;">{{ $model['filiale'] }}</div>
                        @endif
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.marque')}} :</div>
                        @if ($model['marque'] != null)
                            {{--  <div style="margin: 5px 0 5px 20px;">{{ $model['marque']->description }}</div>  --}}
                        @endif
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.usine_id')}} :</div>
                        @if ($model['usine'] != null)
                            <div  style="margin: 5px 0 5px 20px;">{{ $model['usine']->description }}</div>
                        @endif
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.geographique_id')}} :</div>
                        @if ($model['geographique'] != null)
                        <div style="margin: 5px 0 5px 20px;">{{ $model['geographique']->description }}</div>
                        @endif
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.client')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model['client'] }}</div>
                    </div>

                    <div  style="display: grid; grid-template-columns: 80% 20%;">
                        <div style="margin: 5px 0 5px 60px;color: gray;">{{__('models/produitFinis.fields.modele')}} :</div>
                        <div style="margin: 5px 0 5px 20px;">{{ $model->modele }}</div>
                    </div>
            </div>
        </div>

    </div>
    <script>
        $('.loading-produit-semi-fini').hide();
    </script>
@endsection


