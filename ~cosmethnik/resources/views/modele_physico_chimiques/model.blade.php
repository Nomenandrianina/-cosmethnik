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
                        {!! Form::label('physico_chimique_id', __('models/modelephysicoChimiques.fields.physico_chimique_id').':') !!}
                        {!! Form::select('physico_chimique_id',  $physicochimique,null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('caracteristique', __('models/modelephysicoChimiques.fields.caracteristique').':') !!}
                        {!! Form::text('caracteristique', null, ['class' =>  'form-control ' . ( $errors->has('caracteristique') ? ' is-invalid' : '' ),'placeholder'=>'Caractéristique' ]) !!}
                        @if($errors->has('caracteristique'))
                            <span class="text-danger">{{ $errors->first('caracteristique') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-1">
                        {!! Form::label('valeur', __('models/modelephysicoChimiques.fields.valeur').':') !!}
                        {!! Form::text('valeur', null, ['class' =>  'form-control ' . ( $errors->has('valeur') ? ' is-invalid' : '' ),'placeholder'=>'Valeur' ]) !!}
                        @if($errors->has('valeur'))
                            <span class="text-danger">{{ $errors->first('valeur') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-1">
                        {!! Form::label('mini', __('models/modelephysicoChimiques.fields.mini').':') !!}
                        {!! Form::number('mini', null, ['class' =>  'form-control ' . ( $errors->has('mini') ? ' is-invalid' : '' ),'placeholder'=>'mini' ]) !!}
                        @if($errors->has('mini'))
                            <span class="text-danger">{{ $errors->first('mini') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-1">
                        {!! Form::label('max', __('models/modelephysicoChimiques.fields.maxi').':') !!}
                        {!! Form::number('maxi', null, ['class' =>  'form-control ' . ( $errors->has('maxi') ? ' is-invalid' : '' ),'placeholder'=>'maxi' ]) !!}
                        @if($errors->has('maxi'))
                            <span class="text-danger">{{ $errors->first('maxi') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-2">
                        {!! Form::label('critere_texte', __('models/modelephysicoChimiques.fields.critere_texte').':') !!}
                        {!! Form::text('critere_texte', null, ['class' =>  'form-control ' . ( $errors->has('critere_texte') ? ' is-invalid' : '' ),'placeholder'=>'Critère texte' ]) !!}
                        @if($errors->has('critere_texte'))
                            <span class="text-danger">{{ $errors->first('critere_texte') }}</span>
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
                @include('modele_physico_chimiques.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



