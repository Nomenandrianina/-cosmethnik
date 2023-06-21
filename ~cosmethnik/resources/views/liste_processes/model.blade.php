@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('listeProcesses.store') }}" method="POST">
                    @csrf
                <div class="row">
                    <input type="hidden" name="id_model" value="{{ $data[0] }}">
                    <input type="hidden" name="id_site" value="{{ $data[1] }}">
                    <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                    <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                    <input type="hidden" name="model_type" value="{{ $object }}">


                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Etape : </label>
                        {!! Form::text('etape', null, ['class' => 'form-control'.( $errors->has('etape') ? ' is-invalid' : '' ),'placeholder'=>'Etape']) !!}
                        @if($errors->has('etape'))
                            <span class="text-danger">{{ $errors->first('etape') }}</span>
                        @endif
                    </div>


                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Ressource: </label>
                        <select name="ressource_id" id="ressource_id" class="form-control">
                            @foreach ($ressource as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Quantité: </label>
                        <input type="number" name="quantite" min="1" class="form-control">
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Cadence: </label>
                        <input type="number" name="cadence" min="1" class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Unité cadence: </label>
                        <select name="unite_cadence" id="unite_cadence" class="form-control">
                            <option value="P/h">P/h</option>
                            <option value="P/j">P/j</option>
                            <option value="P/m">P/m</option>
                            <option value="P/b">P/b</option>
                            <option value="P/a">P/a</option>
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Produit/h: </label>
                        <input type="number" name="produit_heure" class="form-control">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Taux horaire: </label>
                        <input type="float" name="taux_horaire" class="form-control">
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
                @include('liste_processes.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



