@extends('layouts.adminty')

@section('css')

    <!-- Multi Select css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/multiselect/css/multi-select.css') }}">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{ asset('bower_components/select2/css/select2.min.css') }}">

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Date card start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Modification d'un utilisateur</h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('users.update', $user) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Nom Utilisateur : </label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"  placeholder="Veuillez entrer le nom et Prénom">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Nouveau mot de passe  :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input id="password" type="password" class="form-control" name="password"  value="{{ $user->password }}" class="form-control" placeholder="Veuillez entrer le mot de passe">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Email Utilisateur :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input id="email" type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Veuillez entrer l'adresse mail">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Confirmer mot de passe :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input id="password-confirm" type="password" name="password_confirmation" value="{{ $user->password }}" class="form-control" placeholder="Veuillez confirmer le mot de passe">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Multi-select start -->
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-form-label">Sélectionnez un ou plusieurs rôle(s) :</label>
                                <select id='custom-headers'  data-toggle="tooltip" class="searchable" name="roles[]" multiple='multiple'>
                                    @foreach ($roles as $role)
                                        <option @if (in_array($role->id, $user->roles->pluck('id')->toArray()))
                                            selected
                                        @endif value='{{ $role->id }}'>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Multi-select end -->
                        <div class="row m-t-20">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-10" style="text-align: center;">
                               <a href="{{ route('users.index') }}" class="btn btn-default">
                                     {{ ('Annuler') }}
                               </a>
                                <button type="submit" class="btn btn-primary">
                                     {{ ('Enregistrer') }}
                                </button>
                            </div>
                            <div class="col-md-1">

                            </div>
                       </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-11">
                                <p class="text-inverse text-left m-b-0">Develop By </p>
                                <p class="text-inverse text-left"><a href="#"><b class="f-w-600"> SYNETCOM </b></a></p>
                            </div>
                            <div class="col-md-1">
                                <img src="{{ asset('assets/images/auth/Logo-small-bottom.png') }}" alt="small-logo.png">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Date card end -->
        </div>
    </div>
</div>
@endsection

@section('js')

    <!-- Multiselect js -->
    <script type="text/javascript" src="{{ asset('bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/multiselect/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.quicksearch.js') }}"></script>
    <!-- Select 2 js -->
<script type="text/javascript" src="{{ asset('bower_components/select2/js/select2.full.min.js') }}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{ asset('assets/pages/advance-elements/select2-custom.js') }}"></script>

@endsection
