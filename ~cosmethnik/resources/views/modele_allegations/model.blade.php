@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <form action="{{ route('modeleAllegations.store') }}" method="POST">
                    @csrf
                <div class="row">
                    <input type="hidden" name="id_model" value="{{ $data[0] }}">
                    <input type="hidden" name="id_site" value="{{ $data[1] }}">
                    <input type="hidden" name="id_dossier" value="{{ $data[2] }}">
                    <input type="hidden" name="dossier_parent" value="{{ $data[3] }}">
                    <input type="hidden" name="model_type" value="{{ $object }}">

                    <div class="form-group col-sm-3">
                        {!! Form::label('allegation_id', __('models/modeleAllegations.fields.allegation_id').':') !!}
                        {!! Form::select('allegation_id',  $allegation,null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('revendique', __('models/modeleAllegations.fields.revendique').':') !!}
                        {!! Form::text('revendique', null, ['class' =>  'form-control ' . ( $errors->has('revendique') ? ' is-invalid' : '' ),'placeholder'=>'Caractéristique' ]) !!}
                        @if($errors->has('revendique'))
                            <span class="text-danger">{{ $errors->first('revendique') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-3">
                        {!! Form::label('information', __('models/modeleAllegations.fields.information').':') !!}
                        {!! Form::text('information', null, ['class' =>  'form-control ' . ( $errors->has('information') ? ' is-invalid' : '' ),'placeholder'=>'information' ]) !!}
                        @if($errors->has('information'))
                            <span class="text-danger">{{ $errors->first('information') }}</span>
                        @endif
                    </div>

                    <div class="col-sm-2">
                        {!! Form::label('date_certification', __('models/modeleAllegations.fields.date_certification').':') !!}
                        {!! Form::date('date_certification', null, ['class' =>  'form-control ' . ( $errors->has('date_certification') ? ' is-invalid' : '' ),'placeholder'=>'date_certification' ]) !!}
                        @if($errors->has('date_certification'))
                            <span class="text-danger">{{ $errors->first('date_certification') }}</span>
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



