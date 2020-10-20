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
                    <h3>Les sources de financement</h3>
                </div>
                <div class="card-block">

                    <div class="row">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Projet</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Adresse</th>
                                    <th>Montant annoncé</th>
                                    <th>Décaisser</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bailleurs as $bailleur)
                                           @if($bailleur->bailleur->mail_bailleur == $user->email || $mail_admin)
                                        <tr>
                                            <td>{{ $bailleur->bailleur->nom_bailleur }}</td>
                                            <td>{{ $bailleur->bailleur->mail_bailleur }} </td>
                                            <td>{{ $bailleur->bailleur->contact_bailleur }}</td>
                                            <td>{{ $bailleur->bailleur->adresse_bailleur}}</td>
                                            <td>{{ $bailleur->montant_annonce }}</td>
                                            <td>
                                                <a href="{{ route('decaissement', [$bailleur->id, $bailleur->activite->id]) }}" class="btn btn-info">
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
