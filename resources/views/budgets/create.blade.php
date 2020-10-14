@extends('layouts.adminty')

@section('css')

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Form wizard with validation card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Form Wizard With Validation</h5>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="wizard">
                                <section>
                                    <form class="wizard-form" id="example-advanced-form" method="post" action="{{ route('budgets.store') }}">
                                        @csrf
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="userName-2" class="block">Montant budget *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="userName-2" name="montant_budget" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="email-2" class="block">Date budget *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="email-2" name="date_budget" type="date" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="password-2" class="block">Commentaire *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="password-2" name="commentaire_budget" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">Acitivite</div>
                                                <div class="col-md-8 col-lg-10">
                                                    <select class="form-control required" name="activite_id">
                                                        <option>Selectionnez activite...</option>
                                                        @foreach($activites as $activite)
                                                        <option value="{{  $activite->id }}">{{ $activite->nom_activite  }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <a href="" id="edit-cancel" class="btn btn-default waves-effect">Annuler</a>
                                                <button type="Submit" class="btn btn-primary waves-effect waves-light m-r-20">Enregister</button>
                                            </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form wizard with validation card end -->
        </div>

    </div>
</div>

@endsection

@section('js')
@endsection
