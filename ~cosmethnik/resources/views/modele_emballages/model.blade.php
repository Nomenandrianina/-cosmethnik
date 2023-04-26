@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('modeleEmballages.store') }}" method="POST">
                @csrf
            <div class="row">
                <input type="hidden" name="id_model" value="{{ $data[0] }}">
                <input type="hidden" name="id_site" value="{{ $data[1] }}">
                <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                <input type="hidden" name="model_type" value="{{ $object }}">
                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Emballage: </label>
                        <select name="emballage" id="emballage" class="form-control">
                            @foreach ($emballages as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Quantité: </label>
                        <input type="number" name="quantite"  class="form-control">
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Unité: </label>
                        <select name="unite" id="unite" class="form-control">
                            @foreach ($unite as $item)
                                <option value="{{ $item->description }}">{{ $item->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Freinte%: </label>
                        <input type="number" name="freinte" class="form-control">
                    </div>

                    <div class="col-sm-3">
                        <label for="inputPassword5" class="form-label">Niveau d'emballage: </label>
                        <select name="variantes" id="variantes" class="form-control">
                            <option value="Primaire">Primaire</option>
                            <option value="Secondaire">Secondaire</option>
                            <option value="Tertiaire">Tertiaire</option>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Maître: </label>
                        <select name="maitre" id="maitre" class="form-control">
                            <option value="true">Oui</option>
                            <option value="false">Non</option>
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



