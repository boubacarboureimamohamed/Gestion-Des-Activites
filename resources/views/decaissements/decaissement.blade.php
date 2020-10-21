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
                    <h3>Décaissement des projets</h3>
                </div>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Activite</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Document</th>
                                <th>Détail</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($activites as $activite)
                                        @foreach ($bailleurs as $bailleur)

                                          @if($activite->id == $bailleur->activite_id)

                                           @if($bailleur->bailleur->mail_bailleur == $user->email || $mail_admin)
                                    <tr>
                                        <td>{{ $activite->id }}</td>
                                        <td>{{ $activite->nom_activite }}</td>
                                        <td>{{ $activite->date_debut_activite }}</td>
                                        <td>{{ $activite->date_fin_activite }} </td>
                                        <td>
                                            <a href="{{ asset($activite->piece_jointe) }}" class="btn btn-link">Visualiser</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('show_decaissement', $activite) }}" class="btn btn-info">
                                                <i class="feather icon-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                       @endif
                                       @endif
                                      @endforeach
                                @endforeach
                            </tbody>
                        </table>
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
