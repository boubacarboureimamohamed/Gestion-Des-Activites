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
                    <h3>Liste des activités</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('activites.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i>Nouvelle Activité</a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Libellé Activité</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Observations</th>
                                <th>Piéce jointe</th>
                                <th>Détail</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($activites as $activite)
                                    <tr>
                                        <td>{{ $activite->id }}</td>
                                        <td>{{ $activite->nom_activite }}</td>
                                        <td>{{ $activite->date_debut_activite }}</td>
                                        <td>{{ $activite->date_fin_activite }} </td>
                                        <td>{{ $activite->commentaire_activite }}</td>
                                        <td>
                                            <a href="{{ asset($activite->piece_jointe) }}" class="btn btn-link">Visualiser</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('show_activite', $activite->id) }}" class="btn btn-info">
                                                <i class="feather icon-eye"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('activites.edit', $activite) }}" class="btn btn-primary">
                                                <i class="feather icon-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('activites.destroy', $activite) }}" id="form{{ $activite->id }}">

                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="button" onclick="confirmation('#form{{ $activite->id }}')" class="btn btn-danger" >
                                                    <i class="feather icon-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
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
