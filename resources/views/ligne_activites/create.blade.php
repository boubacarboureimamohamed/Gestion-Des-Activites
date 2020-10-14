@extends('layouts.adminty')

@section('css')
<!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
<!--forms-wizard css-->
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/jquery.steps/css/jquery.steps.css') }}">

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Form wizard with validation card start -->
            <div class="card">
                <div class="card-header">
                    <h5>Form Wizard With Validation</h5>
                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>

                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="wizard">
                                <section>
                                    <form class="wizard-form" id="example-advanced-form" method="post" action="{{ route('ligne_activites.store') }}">
                                        @csrf
                                        <h3> Registration </h3>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="userName-2" class="block">Nom ligne *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="userName-2" name="nom_ligne_activite" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="email-2" class="block">Nom & prenom responsable *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="email-2" name="nom_responsable_ligne" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="password-2" class="block">Mail responsable *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="password-2" name="mail_responsable_ligne" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="confirm-2" class="block">Contact responsable *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="confirm-2" name="contact_responsable_ligne" type="text" class="form-control required">
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
