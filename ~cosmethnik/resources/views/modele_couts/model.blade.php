@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('modeleCouts.store') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id_model" value="{{ $data[0] }}">
                    <input type="hidden" name="id_site" value="{{ $data[1] }}">
                    <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                    <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                    <input type="hidden" name="model_type" value="{{ $object }}">

                    <div class="col-sm-3">
                        <label for="inputPassword5" class="form-label">Coûts: </label>
                        <select name="cout_id" id="cout_id" class="form-control">
                            @foreach ($couts as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1 unite">
                        <label for="inputPassword5" class="form-label">Valeur: </label>
                        <input type="number" name="valeur" placeholder="1" min="1"  class="form-control">
                        @if($errors->has('valeur'))
                            <span class="text-danger">{{ $errors->first('valeur') }}</span>
                        @endif
                    </div>

                    <div class="col-md-1 ">
                        <label for="inputPassword5" class="form-label">Unité: </label>
                        <select name="unite" id="unite" class="form-control">
                            @foreach ($unite as $item)
                                <option value="{{ $item->description }}">{{ $item->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1 unite">
                        <label for="inputPassword5" class="form-label">Valeur 1: </label>
                        <input type="number" name="valeur1" placeholder="1" min="1"  class="form-control">
                        @if($errors->has('valeur1'))
                            <span class="text-danger">{{ $errors->first('valeur1') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-1 unite">
                        <label for="inputPassword5" class="form-label">Valeur 2: </label>
                        <input type="number" name="valeur2" placeholder="1" min="1"  class="form-control">
                        @if($errors->has('valeur2'))
                            <span class="text-danger">{{ $errors->first('valeur2') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-1 unite">
                        <label for="inputPassword5" class="form-label">Euv : </label>
                        <input type="number" name="euv" placeholder="1" min="1"  class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Manuel </label>
                        <input type="checkbox" name="manuel" value="1" class="form-control" style="width: 23px;">
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
                @include('modele_emballages.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



