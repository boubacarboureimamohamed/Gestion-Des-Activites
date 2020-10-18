@extends('layouts.adminty')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Date card start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Modification d'un responsable d'activite</h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('responsable_activites.update', $responsable_activite) }}">
                       {{ csrf_field() }}
                       {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Nom : </label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="nom_responsable_activite" value="{{ $responsable_activite->nom_responsable_activite }}" class="form-control" placeholder="Veuillez entrer le nom du responsable">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Adresse mail :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="mail_responsable_activite" value="{{ $responsable_activite->mail_responsable_activite }}" class="form-control" placeholder="Veuillez entrer l'adresse mail du responsable">
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
                                                <label class="col-form-label">Prenom:</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="prenom_responsable_activite" value="{{ $responsable_activite->prenom_responsable_activite }}" class="form-control" placeholder="Veuillez entrer le prenom du responsable">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Contact :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="contact_responsable_activite" value="{{ $responsable_activite->contact_responsable_activite }}" class="form-control" placeholder="Veuillez entrer le contact du reponsable">
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
                               <a href="{{ route('responsable_activites.index') }}" class="btn btn-default">
                                     {{ ('Annuler') }}
                               </a>
                                <button type="submit" class="btn btn-primary">
                                     {{ ('Modifier') }}
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
