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
                <div class="row">
                    <div class="col-md-10">
                        Désignation
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" id="link-modal-edit" data-bs-toggle="modal" data-bs-target="#edit-modal"><i class="fas fa-edit"></i> Modifier</button>
                    </div>
                </div>
            </div>

            <div class="card-body p-0" id="div-change">
                <div  class="name-fields">
                    <div class="name-description">{{__('models/produitFinis.fields.nom')}} :</div>
                    <div class="name-description-second">{{ $model->nom }}</div>
                </div>

                @if ($model->libelle_commerciale)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.libelle_commerciale')}} :</div>
                        <div class="name-description-second">{{ $model->libelle_commerciale }}</div>
                    </div>
                @endif

                @if ($model->famille)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.famille')}} :</div>
                        <div class="name-description-second"></div>
                    </div>
                @endif

                @if ($model->famille)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.sous-famille')}} :</div>
                        <div class="name-description-second"></div>
                    </div>
                @endif

                <hr>
                <div  class="name-fields">
                    <div class="name-description">{{__('models/produitFinis.fields.libelle_legale')}} :</div>
                    <div class="name-description-second">{{ $model->libelle_legale }}</div>
                </div>

                <hr>

                <div  class="name-fields">
                    <div class="name-description">{{__('models/produitFinis.fields.description')}} :</div>
                    <div class="name-description-second">{{ $model->description }}</div>
                </div>

                @if ($model['etat_produit'])
                    <hr>
                    <div  class="name-fields">
                    <div class="name-description">{{__('models/produitFinis.fields.etat_produit_id')}} :</div>
                        <div class="name-description-second">{{ $model['etat_produit']->designation }}</div>
                    </div>
                @endif
                <hr>
                <div  class="name-fields">
                    <div class="name-description">{{__('models/produitFinis.fields.code_becpg')}} :</div>
                    <div class="name-description-second">{{ $model->code_becpg }}</div>
                </div>
                <hr>
                <div  class="name-fields">
                    <div class="name-description">{{__('models/produitFinis.fields.code_erp')}} :</div>
                    <div class="name-description-second">{{ $model->code_erp }}</div>
                </div>
                @if ($model->ean)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.ean')}} :</div>
                        <div class="name-description-second">{{ $model->ean }}</div>
                    </div>
                @endif

                @if ($model->ean_coli)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.ean_colis')}} :</div>
                        <div class="name-description-second">{{ $model->ean_colis }}</div>
                    </div>
                @endif

                @if ($model->ean_palette)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.ean_palette')}} :</div>
                        <div class="name-description-second">{{ $model->ean_palette }}</div>
                    </div>
                @endif

                @if ($model['filiale'] != null)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.filiale')}} :</div>
                            <div class="name-description-second">{{ $model['filiale'] }}</div>
                    </div>
                @endif
                @if ($model['marque'] != null)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.marque')}} :</div>
                            <div class="name-description-second">{{ $model['marque']->description }}</div>
                    </div>
                @endif
                @if ($model['usine'] != null)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.usine_id')}} :</div>
                            <div  class="name-description-second">{{ $model['usine']->description }}</div>
                    </div>
                @endif
                @if ($model['geographique'] != null)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.geographique_id')}} :</div>
                        <div class="name-description-second">{{ $model['geographique']->description }}</div>
                    </div>
                @endif
                @if ($model['client'] != null)
                    <hr>
                    <div  class="name-fields">
                        <div class="name-description">{{__('models/produitFinis.fields.client')}} :</div>
                        <div class="name-description-second">{{ $model['client'] }}</div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('proprietes.modal_edit')
    @include('proprietes.script.scripts_proprietes')
    <script>
        $('.loading-produit-semi-fini').hide();
    </script>
@endsection


