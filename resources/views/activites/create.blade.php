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
                                    <form class="wizard-form" id="example-advanced-form" action="#">
                                        <h3> Registration </h3>
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="userName-2" class="block">User name *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="userName-2" name="userName" type="text" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="email-2" class="block">Email *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="email-2" name="email" type="email" class="required form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="password-2" class="block">Password *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="password-2" name="password" type="password" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="confirm-2" class="block">Confirm Password *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="confirm-2" name="confirm" type="password" class="form-control required">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <h3> General information </h3>
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="name-2" class="block">First name *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="name-2" name="name" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="surname-2" class="block">Last name *</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="surname-2" name="surname" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="phone-2" class="block">Phone #</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="phone-2" name="phone" type="number" class="form-control required phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="date" class="block">Date Of Birth</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="date" name="Date Of Birth" type="text" class="form-control required date-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">Select Country</div>
                                                <div class="col-md-8 col-lg-10">
                                                    <select class="form-control required">
                                                        <option>Select State</option>
                                                        <option>Gujarat</option>
                                                        <option>Kerala</option>
                                                        <option>Manipur</option>
                                                        <option>Tripura</option>
                                                        <option>Sikkim</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <h3> Education </h3>
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="University-2" class="block">University</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="University-2" name="University" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="Country-2" class="block">Country</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="Country-2" name="Country" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="Degreelevel-2" class="block">Degree level #</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="Degreelevel-2" name="Degree level" type="text" class="form-control required phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4 col-lg-2">
                                                    <label for="datejoin" class="block">Date Join</label>
                                                </div>
                                                <div class="col-md-8 col-lg-10">
                                                    <input id="datejoin" name="Date Of Birth" type="text" class="form-control required">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <h3> Work experience </h3>
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="Company-2" class="block">Company:</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input id="Company-21" name="Company:" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="CountryW-2" class="block">Country</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input id="CountryW-21" name="Country" type="text" class="form-control required">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="Position-2" class="block">Position</label>
                                                </div>
                                                <div class="col-sm-12">
                                                    <input id="Position-21" name="Position" type="text" class="form-control required">
                                                </div>
                                            </div>
                                        </fieldset>
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

<!--Forms - Wizard js-->
<script src="{{ asset('bower_components/jquery.cookie/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('bower_components/jquery.steps/js/jquery.steps.js') }}"></script>
<script src="{{ asset('bower_components/jquery-validation/js/jquery.validate.js') }}"></script>
<script src="{{ asset('assets/pages/forms-wizard-validation/form-wizard.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('assets/js/vartical-layout.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{ asset('bower_components/modernizr/js/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/modernizr/js/css-scrollbars.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/form-validation/validate.js') }}"></script>

@endsection
