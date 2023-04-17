@extends('clients.layouts.models.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Produit: </label>
                        <select name="" id="" class="form-control">
                            <option value="1">Eau</option>
                            <option value="2">Tomate</option>
                            <option value="3">Fromage</option>
                            <option value="4">Ognion</option>
                        </select>
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Quantité: </label>
                        <input type="number"  class="form-control" aria-labelledby="passwordHelpBlock">
                    </div>

                    <div class="col-sm-1">
                        <label for="inputPassword5" class="form-label">Unité: </label>
                        <select name="unite" id="" class="form-control">
                            <option value="1">Kg</option>
                            <option value="2">L</option>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Rendement %: </label>
                        <input type="number"  class="form-control" aria-labelledby="passwordHelpBlock">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Freinte %: </label>
                        <input type="number"  class="form-control" aria-labelledby="passwordHelpBlock">
                    </div>

                    <div class="col-sm-2">
                        <label for="inputPassword5" class="form-label">Poids: </label>
                        <input type="number"  class="form-control" aria-labelledby="passwordHelpBlock">
                    </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('compositions.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



