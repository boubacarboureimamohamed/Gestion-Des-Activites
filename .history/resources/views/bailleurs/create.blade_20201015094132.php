@extends('layouts.adminty')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <!-- Date card start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Ajout d'un nouveau bailleur</h3>
                </div>
                <div class="card-block">
                    <form method="POST" action="{{ route('bailleurs.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Nom du bailleur : </label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" value="{{ old('nom_bailleur') }}" name="nom_bailleur" class="form-control" placeholder="Veuillez entrer le nom du bailleur">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-sm-3">
                                                <label class="col-form-label">Adresse du bailleur :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="adresse_bailleur" value class="form-control @error('adresse_bailleur') is-invalid @enderror" placeholder="Veuillez entrer l'adresse du bailleur">
                                                @error('adresse_bailleur')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
                                                <label class="col-form-label">Contact du bailleur :</label>
                                            </div>
                                            <div class="col-sm-9 input-group">
                                                <span class="input-group-addon" id="basic-addon7"></span>
                                                <input type="text" name="contact_bailleur" class="form-control @error('contact_bailleur') is-invalid @enderror" placeholder="Veuillez entrer le contact du bailleur">
                                                @error('contact_bailleur')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
                               <a href="{{ route('bailleurs.index') }}" class="btn btn-default">
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
