@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('modelePhysicoChimiques.store') }}" method="POST">
                    @csrf
                <div class="row">
                    <input type="hidden" name="id_model" value="{{ $data[0] }}">
                    <input type="hidden" name="id_site" value="{{ $data[1] }}">
                    <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                    <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                    <input type="hidden" name="model_type" value="{{ $object }}">

                    <div class="form-group col-sm-3">
                        {!! Form::label('organoleptique', __('models/modeleOrganoleptiques.fields.organoleptique').':') !!}
                        {!! Form::select('organoleptique',  $organoleptique,null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('caracteristique', __('models/modeleOrganoleptiques.fields.caracteristique').':') !!}
                        {!! Form::text('caracteristique', null, ['class' =>  'form-control ' . ( $errors->has('caracteristique') ? ' is-invalid' : '' ),'placeholder'=>'Caractéristique' ]) !!}
                        @if($errors->has('caracteristique'))
                            <span class="text-danger">{{ $errors->first('caracteristique') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-1">
                        {!! Form::label('valeur', __('models/modeleOrganoleptiques.fields.valeur').':') !!}
                        {!! Form::text('valeur', null, ['class' =>  'form-control ' . ( $errors->has('valeur') ? ' is-invalid' : '' ),'placeholder'=>'Valeur' ]) !!}
                        @if($errors->has('valeur'))
                            <span class="text-danger">{{ $errors->first('valeur') }}</span>
                        @endif
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
                @include('modele_organoleptiques.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



