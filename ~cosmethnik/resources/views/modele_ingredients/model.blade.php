@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('modeleIngredients.store') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id_model" value="{{ $data[0] }}">
                    <input type="hidden" name="id_site" value="{{ $data[1] }}">
                    <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                    <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                    <input type="hidden" name="model_type" value="{{ $object }}">

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Ingrédients: </label>
                        <select name="ingredient" id="ingredient" class="form-control">
                            @foreach ($ingredients as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Quantité: </label>
                        <input type="number" name="quantite" placeholder="1" min="1"  class="form-control">
                        @if($errors->has('quantite'))
                            <span class="text-danger">{{ $errors->first('quantite') }}</span>
                        @endif
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
                        <label for="inputPassword5" class="form-label">OGM: </label>
                        <input class="form-control checkbox-ingredients" type="checkbox" name="omg" value="1" >
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Ionisation: </label>
                        <input class="form-control checkbox-ingredients" type="checkbox" name="ionisation"  value="1" >
                    </div>

                    <div class="col-sm-3 auxiliaire">
                        <label for="inputPassword5" class="form-label">Auxiliaire technologique: </label>
                        <input class="form-control checkbox-auxiliaire" type="checkbox" name="auxiliaire" value="1"  >
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Support: </label>
                        <input class="form-control checkbox-ingredients" type="checkbox" name="support" value="1"  >
                    </div>

                    <button type="submit" class="btn btn-primary btn-validation">Ajouter</button>
                </div>
            </form>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('ingredients.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

