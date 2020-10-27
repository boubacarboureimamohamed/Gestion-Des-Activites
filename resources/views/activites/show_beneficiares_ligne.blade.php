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
                    <h3>Liste des beneficiares de <strong>{{ $ligne_activite->nom_ligne_activite }}</strong></h3>
                </div>
                <div class="card-block"><br><br>
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Beneficiaires</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($beneficiaires_lignes as $beneficiaires_ligne)
                                    <tr>
                                        <td>{{ $beneficiaires_ligne->id }}</td>
                                        <td>{{ $beneficiaires_ligne->beneficiaire->nom_beneficiaire }}</td>
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
