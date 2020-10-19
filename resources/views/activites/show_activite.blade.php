@extends('layouts.adminty')

@section('css')

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Zero config.table start -->
            <div class="card">
                <div class="card-header"  style="text-align: center;">
                    <h3>Détails de l'activite {{ $activite->nom_activite }}</h3>
                </div>
                <div class="card-block">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Libellé de l'activite : </label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text"  name="" class="form-control" value="{{ $activite->nom_activite }}" disabled placeholder="Veuillez entrer le nom de l'activité">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Date debut :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="{{ $activite->date_debut_activite }}" placeholder="Veuillez entrer la date début de l'activité" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Budget total :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="" placeholder="Veuillez entrer le budget total de l'activité" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Montant total decaissé :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="" placeholder="Veuillez entrer le montant decaissé de l'activité" disabled>
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
                                            <label class="col-form-label">Responsable de l'activite :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="{{ $activite->responsableActivite->nom_responsable_activite.' '.$activite->responsableActivite->prenom_responsable_activite }}" placeholder="Veuillez entrer le nom et prénom du responsable de l'activité" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Date fin :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="{{ $activite->date_fin_activite }}" placeholder="Veuillez entrer la date fin de l'activité" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Montant total annoncé :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control"value="" placeholder="Veuillez entrer le montant total annoncé de l'activité" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">GAP :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="" placeholder="Veuillez entrer le GAP" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 style="text-align: center;">Les sources de financement</h5><br><br>
                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Projet</th>
                                    <th>Montant annoncé </th>
                                    <th>Montant decaissé</th>
                                    <th>GAP</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activite->bailleurs as $bailleur)
                                        <tr>
                                            <td>{{ $bailleur->nom_bailleur }}</td>
                                            <td>{{ $bailleur->pivot->montant_annonce }} </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <h5 style="text-align: center;">Les lignes de l'activite</h5><br><br>
                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Ligne</th>
                                    <th>Responsable</th>
                                    <th>Montant prévu </th>
                                    <th>Montant depensé</th>
                                    <th>GAP</th>
                                    <th>Piéce jointe</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activite->ligneActivites as $ligneActivite)
                                        <tr>
                                            <td>{{ $ligneActivite->nom_ligne_activite }}</td>
                                            <td>{{ $ligneActivite->pivot->nom_responsable }} </td>
                                            <td>{{ $ligneActivite->pivot->montant_prevu }}</td>
                                            <td> </td>
                                            <td> </td>
                                            <td>
                                                <a href="{{ asset($activite->piece_jointe) }}" class="btn btn-link">Visualiser</a>
                                            </td>
                                        </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="row m-t-20">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-10" style="text-align: center;">
                            <a href="{{ route('activites.index') }}" class="btn btn-default">
                                    {{ ('Retour') }}
                            </a>
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

                </div>
            </div>
            <!-- Zero config.table end -->

        </div>

    </div>
</div>

@endsection

@section('js')

@endsection
