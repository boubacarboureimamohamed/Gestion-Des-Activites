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
                    <h3>Liste des bailleurs</h3>
                </div>
                <div class="card-block">
                    <a href="{{ route('bailleurs.create') }}" class="btn btn-success">
                        <i class="feather icon-plus"></i> Ajouter</a>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Contact</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($bailleurs as $bailleur)
                                <tr>
                                <td> {{ $bailleur->id }} </td>
                                <td> {{ $bailleur->nom_bailleur}} </td>
                                <td> {{ $bailleur->adresse_bailleur }}</td>
                                <td> {{ $bailleur->contact_bailleur }}</td>
                                <td>
                                    <a href="{{ route('bailleurs.edit', $bailleur) }}" class="btn btn-primary">
                                        <i class="feather icon-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('bailleurs.destroy', $bailleur) }}" id="form{{ $bailleur->id }}">

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" onclick="confirmation('#form{{ $bailleur->id }}')" class="btn btn-danger" >
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
