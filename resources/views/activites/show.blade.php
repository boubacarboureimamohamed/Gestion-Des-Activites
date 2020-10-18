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
                    <h3>Information de l'activite <strong>{{ $activite->nom_activite }}</strong></h3>
                </div>
                <div class="card-block">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Nom de l'activite : </label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text"  name="" value="{{ $activite->nom_activite }}" class="form-control" disabled placeholder="">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Responsable de l'activite :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $activite->responsableActivite->nom_responsable_activite.' '.$activite->responsableActivite->prenom_responsable_activite  }}" class="form-control" placeholder="" disabled>
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
                                            <label class="col-form-label">Date debut :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $activite->date_debut_activite }}" class="form-control" placeholder="" disabled>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-3">
                                            <label class="col-form-label">Date fin :</label>
                                        </div>
                                        <div class="col-sm-9 input-group">
                                            <span class="input-group-addon" id="basic-addon7"></span>
                                            <input type="text" name="" value="{{ $activite->date_fin_activite }}" class="form-control" placeholder="" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 style="text-align: center;">Les lignes de l'activite</h5><br><br>
                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Ligne activite</th>
                                    <th>Nom responsable</th>
                                    <th>Contact responsable </th>
                                    <th>Email responsable</th>
                                    <th>Justifier</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activite->ligneActivites as $ligneActivite)
                                           @if($ligneActivite->pivot->mail_responsable == $user->email || $mail_admin)
                                        <tr>
                                            <td>{{ $ligneActivite->nom_ligne_activite }}</td>
                                            <td>{{ $ligneActivite->pivot->nom_responsable }} </td>
                                            <td>{{ $ligneActivite->pivot->contact_responsable }}</td>
                                            <td>{{ $ligneActivite->pivot->mail_responsable }}</td>
                                            <td>
                                                <a href="{{ route('justification', $ligneActivite->id) }}" class="btn btn-info">
                                                    <i class="feather icon-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
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
