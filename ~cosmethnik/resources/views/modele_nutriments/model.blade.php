@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('modeleNutriments.store') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id_model" value="{{ $data[0] }}">
                    <input type="hidden" name="id_site" value="{{ $data[1] }}">
                    <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                    <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                    <input type="hidden" name="model_type" value="{{ $object }}">

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Nutriments: </label>
                        <select name="nutriment_id" id="ingredient" class="form-control">
                            @foreach ($nutriments as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Valeur: </label>
                        {!! Form::number('valeur', null, ['class' => 'form-control'.( $errors->has('valeur') ? ' is-invalid' : '' ),'placeholder'=>'1']) !!}
                        @if($errors->has('valeur'))
                            <span class="text-danger">{{ $errors->first('valeur') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Mini: </label>
                        <input type="number" name="mini" placeholder="1" min="1"  class="form-control">
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Maxi: </label>
                        <input type="number" name="maxi" placeholder="1" min="1"  class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">1 portion: </label>
                        <input type="number" name="portion" placeholder="1" min="1"  class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Perte: </label>
                        <input type="number" name="perte" placeholder="1" min="1"  class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Méthode: </label>
                        <input type="text" name="methode" placeholder="Méthode" "  class="form-control">
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
                @include('modele_nutriments.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

