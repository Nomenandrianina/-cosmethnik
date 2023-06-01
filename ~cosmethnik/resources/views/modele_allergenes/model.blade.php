@extends('clients.layouts.models.app')
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
                    <div class="col-sm-3">
                        <label for="inputPassword5" class="form-label">Allergènes: </label>
                        <select name="allergenes" id="allergenes" class="form-control">
                            @foreach ($allergenes as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Quantité: </label>
                        <input type="number" name="quantite"  class="form-control">
                    </div>

                    {{-- <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Unité: </label>
                        <select name="unite" id="unite" class="form-control">
                            @foreach ($unite as $item)
                                <option value="{{ $item->description }}">{{ $item->description }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Prés. Volontaire </label>
                        <input type="checkbox" name="pres_volontaire" value="1" class="form-control" style="width: 23px;">
                    </div>

                    <div class="col-sm-4">
                        <label for="inputPassword5" class="form-label">Arbre de décision: </label>
                        <select name="arbre_decision" id="arbre_decision" class="form-control">
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
                            <option value="Non renseigné">Non renseigné</option>
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="inputPassword5" class="form-label">Prés. fortuite </label>
                        <input type="checkbox" name="pres_fortuite" value="1" class="form-control" style="width: 23px;">
                    </div>

                    <div class="col-sm-3">
                        <label for="inputPassword5" class="form-label">Sources de prés. volontaire: </label>
                        <select name="source_volontaire" id="source_volontaire" class="form-control">
                            @foreach ($mp as $item)
                                <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3">
                        <label for="inputPassword5" class="form-label">Sources de prés. fortuite: </label>
                        <select name="source_fortuite" id="source_fortuite" class="form-control">
                            @foreach ($ressource as $item)
                                <option value="{{ $item->nom }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 158px;margin: 32px 0px 0px 0px;height: 37px;">Ajouter</button>

            </div>
        </form>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('modele_emballages.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



