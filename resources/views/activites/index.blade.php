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
                        <i class="feather icon-plus"></i> Ajouter</a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Nom activite</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Commentaire</th>
                                <th>Piece jointe</th>
                                <th>Detail</th>
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
                                        <td>{{ $activite->piece_jointe }}</td>
                                        <td>
                                            <a href="{{ route('activites.show', $activite) }}" class="btn btn-info">
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
