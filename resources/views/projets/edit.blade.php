@extends('layouts.adminty')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Date card start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Modification d'un projet</h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('projets.update', $projet) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Projet : </label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="nom_projet" class="form-control" value="{{ $projet->nom_projet }}" placeholder="Veuillez entrer le libellé du projet">

                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Contact responsable :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="contact_responsable_projet" class="form-control" value="{{ $projet->contact_responsable_projet }}" placeholder="Veuillez entrer le contact du projet">

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
                                                <label class="col-form-label">Nom responsable :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="nom_responsable_projet" class="form-control" value="{{ $projet->nom_responsable_projet }}" placeholder="Veuillez entrer l'adresse du projet">

                                            </div>
                                        </div>
                                         <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Adresse mail :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="email_responsable_projet" class="form-control" value="{{ $projet->email_responsable_projet }}" placeholder="Veuillez entrer l'adresse mail du projet">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-10" style="text-align: center;">
                               <a href="{{ route('projets.index') }}" class="btn btn-default">
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
