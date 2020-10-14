@extends('layouts.adminty')

@section('css')

@endsection

@section('content')

<div class="page-body">
    <div class="row">

        <div class="col-sm-12">

            <!-- Zero config.table start -->
            <div class="card">
                <div class="card-header">
                    <h5>Zero Configuration</h5>
                    <span>DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: $().DataTable();.</span>

                </div>
                <a href="{{ route('activites.create') }}" class="btn btn-success btn-round">Ajouter</a>
                <div class="card-block">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Nom ligne</th>
                                <th>Nom responsable</th>
                                <th>Mail responsable</th>
                                <th>Contact responsable</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($ligne_activites as $ligne_activite)
                                <tr>
                                    <td>{{ $ligne_activite->nom_ligne_activite }}</td>
                                    <td>{{ $ligne_activite->nom_responsable_ligne }}</td>
                                    <td>{{ $ligne_activite->mail_responsable_ligne }}</td>
                                    <td>{{ $ligne_activite->contact_responsable_ligne }}</td>
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
