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
                                   {{--  <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">GAP :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="{{ $gap }}" placeholder="Veuillez entrer le budget total de l'activité" disabled>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
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
                                            <label class="col-form-label">Budget :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" class="form-control" value="{{ $budget->montant_budget}}" placeholder="Veuillez entrer le budget total de l'activité" disabled>
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
                                    <th>#</th>
                                    <th>Projet</th>
                                    <th>Montant annoncé </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bailleurs as $bailleur)
                                        <tr>
                                            <td>{{ $bailleur->id }}</td>
                                            <td>{{ $bailleur->bailleur->nom_bailleur }}</td>
                                            <td>{{ $bailleur->montant_annonce }} </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td colspan="2"&nbsp;><b>Total montant annonce</b></td>
                                            <td>{{ $somme_montant }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><br>

                    <h5 style="text-align: center;">Les lignes de l'activite</h5><br><br>
                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Ligne Activite</th>
                                    <th>Quantite</th>
                                    <th>Montant</th>
                                    <th>PTF</th>
                                    <th>Affichier les beneficiaires</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ligne_activites as $ligneActivite)
                                            <tr>
                                                <td>{{ $ligneActivite->nom_ligne_activite }}</td>
                                                <td>{{ $ligneActivite->quantite_ligne_activite }}</td>
                                                <td>{{ $ligneActivite->montant_ligne_activite }}</td>
                                                <td>{{ $ligneActivite->bailleur_ligne_activite }}</td>
                                                <td>
                                                <a href="{{ route('show_beneficiaires_ligne', $ligneActivite->id) }}" class="btn btn-info">
                                                    <i class="feather icon-eye"></i>
                                                </a>
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
